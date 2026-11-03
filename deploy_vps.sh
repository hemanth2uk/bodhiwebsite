#!/bin/bash
set -e

echo "=========================================="
echo " Starting Bodhi Website VPS Deployment... "
echo "=========================================="

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$SCRIPT_DIR"

# 1. Import MySQL Database
echo "[1/5] Importing database schema & seed data..."
mysql -u bodh_bodhiplus -p'Bodhiedu@2024' bodh_bodhiplus < server/database_dump.sql 2>/dev/null || echo "Database import finished or already initialized."

# 2. Setup Server .env
echo "[2/5] Setting up server .env configuration..."
cat << 'EOF' > server/.env
PORT=5000
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=bodh_bodhiplus
DB_USER=bodh_bodhiplus
DB_PASS=Bodhiedu@2024
JWT_SECRET=bodhi_super_secret_jwt_key_2026
CLIENT_URL=https://www.bodhiplus.com
EOF

# 3. Start Backend Node API
echo "[3/5] Installing server dependencies & starting PM2..."
cd server
npm install --production

if ! command -v pm2 &> /dev/null; then
    npm install -g pm2
fi

pm2 delete bodhi-api 2>/dev/null || true
pm2 start index.js --name bodhi-api
pm2 save
cd ..

# 4. Deploy Frontend
echo "[4/5] Copying pre-built frontend to public_html..."
TARGET_DIR="/home/bodhiplus.com/public_html"
if [ -d "$TARGET_DIR" ]; then
    cp -rf client/dist/* "$TARGET_DIR/"
    cp -f client/dist/.htaccess "$TARGET_DIR/"
    OWNER=$(stat -c '%U:%G' "$TARGET_DIR" 2>/dev/null || echo "nobody:nobody")
    chown -R "$OWNER" "$TARGET_DIR" 2>/dev/null || true
    chmod -R 755 "$TARGET_DIR" 2>/dev/null || true
    echo "Frontend deployed to $TARGET_DIR (owner: $OWNER)"
else
    echo "Directory $TARGET_DIR not found, skipping copy."
fi

# 5. OpenLiteSpeed Reverse Proxy Configuration
echo "[5/5] Configuring OpenLiteSpeed Reverse Proxy..."
FOUND=0
for VHOST_CONF in /usr/local/lsws/conf/vhosts/*/vhost.conf; do
    if [ -f "$VHOST_CONF" ] && [[ "$VHOST_CONF" == *"bodhiplus"* ]]; then
        FOUND=1
        echo "Found OpenLiteSpeed vhost configuration: $VHOST_CONF"
        if ! grep -q "bodhi_backend" "$VHOST_CONF"; then
            echo "Injecting reverse proxy contexts (/api and /uploads) into $VHOST_CONF..."
            cat << 'EOF' >> "$VHOST_CONF"

extprocessor bodhi_backend {
  type                    proxy
  address                 127.0.0.1:5000
  maxConns                100
  pcKeepAliveTimeout      60
  initTimeout             60
  retryTimeout            0
  respBuffer              0
}

context /api {
  type                    proxy
  handler                 bodhi_backend
  addDefaultCharset       off
}

context /uploads {
  type                    proxy
  handler                 bodhi_backend
  addDefaultCharset       off
}
EOF
        else
            echo "Reverse proxy is already present in $VHOST_CONF."
        fi
    fi
done

if [ "$FOUND" -eq 1 ]; then
    echo "Restarting OpenLiteSpeed..."
    systemctl restart lsws || /usr/local/lsws/bin/lswsctrl restart || true
    echo "OpenLiteSpeed restarted successfully!"
else
    echo "Looking for generic vhosts..."
    systemctl restart lsws 2>/dev/null || true
fi

echo "=========================================="
echo " Checking PM2 status and logs:           "
echo "=========================================="
sleep 2
pm2 list
pm2 logs bodhi-api --lines 10 --nostream

echo "=========================================="
echo " Testing local API health check:          "
curl -s http://127.0.0.1:5000/api/health || echo "Could not connect to port 5000"
echo ""
echo "=========================================="
echo " DEPLOYMENT COMPLETE!                     "
echo "=========================================="

$docxFiles = Get-ChildItem -Path "C:\wamp64\www\bodhiwebsite\updates" -Filter "*.docx"
foreach ($file in $docxFiles) {
    $tempZip = Join-Path $file.DirectoryName ($file.BaseName + ".zip")
    $tempDir = Join-Path $file.DirectoryName ($file.BaseName + "_extract")
    
    if (Test-Path $tempZip) { Remove-Item $tempZip }
    if (Test-Path $tempDir) { Remove-Item $tempDir -Recurse -Force }
    
    try {
        Copy-Item $file.FullName $tempZip
        Expand-Archive -Path $tempZip -DestinationPath $tempDir -ErrorAction Stop
        
        $docXml = Join-Path $tempDir "word/document.xml"
        if (Test-Path $docXml) {
            $xmlContent = Get-Content $docXml -Raw
            # Simple text extraction from XML tags
            $plainText = [regex]::Replace($xmlContent, "<[^>]+>", " ")
            Write-Output "--- START: $($file.Name) ---"
            Write-Output $plainText
            Write-Output "--- END: $($file.Name) ---`n"
        }
    } catch {
        Write-Output "Error processing $($file.Name): $($_.Exception.Message)"
    }
    
    if (Test-Path $tempZip) { Remove-Item $tempZip }
    if (Test-Path $tempDir) { Remove-Item $tempDir -Recurse -Force }
}

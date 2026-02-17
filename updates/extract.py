import zipfile
import xml.etree.ElementTree as ET
import os
import sys

# Reconfigure stdout to use utf-8
if hasattr(sys.stdout, 'reconfigure'):
    sys.stdout.reconfigure(encoding='utf-8')
else:
    import io
    sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

def get_docx_text(path):
    """
    Take the path of a docx file as argument, return the text in unicode.
    """
    try:
        document = zipfile.ZipFile(path)
        xml_content = document.read('word/document.xml')
        document.close()
        tree = ET.fromstring(xml_content)
        
        text = []
        for descendant in tree.iter():
            tag = descendant.tag.split('}')[-1]
            if tag == 't':
                text.append(descendant.text or "")
            elif tag == 'p':
                text.append("\n")
        
        return "".join(text)
    except Exception as e:
        return f"Error: {str(e)}"

if __name__ == "__main__":
    for file in os.listdir('.'):
        if file.endswith('.docx'):
            print(f"--- START: {file} ---")
            print(get_docx_text(file))
            print(f"--- END: {file} ---\n")

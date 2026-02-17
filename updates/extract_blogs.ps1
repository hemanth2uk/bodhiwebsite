$docPath = "C:\wamp64\www\bodhiwebsite\updates\Blogs .docx"
$outputPath = "C:\wamp64\www\bodhiwebsite\updates\blogs_content.txt"

# Load Word COM object
$word = New-Object -ComObject Word.Application
$word.Visible = $false

try {
    # Open the document
    $doc = $word.Documents.Open($docPath)
    
    # Get the text content
    $content = $doc.Content.Text
    
    # Save to text file
    $content | Out-File -FilePath $outputPath -Encoding UTF8
    
    Write-Host "Content extracted successfully to $outputPath"
    
    # Close document
    $doc.Close()
} catch {
    Write-Host "Error: $_"
} finally {
    # Quit Word
    $word.Quit()
    [System.Runtime.Interopservices.Marshal]::ReleaseComObject($word) | Out-Null
}

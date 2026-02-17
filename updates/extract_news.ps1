$word = New-Object -ComObject Word.Application
$doc = $word.Documents.Open('C:\wamp64\www\bodhiwebsite\updates\NEWS.docx')
$text = $doc.Content.Text
$text | Out-File -FilePath 'C:\wamp64\www\bodhiwebsite\updates\news_content.txt' -Encoding utf8
$doc.Close()
$word.Quit()
echo "Extraction complete!"

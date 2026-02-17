$word = New-Object -ComObject Word.Application
$doc = $word.Documents.Open("C:\wamp64\www\bodhiwebsite\updates\Instead of schools - programmes.docx")
$doc.Content.Text | Out-File -FilePath "C:\wamp64\www\bodhiwebsite\updates\programmes_content.txt" -Encoding utf8
$doc.Close()
$word.Quit()

$word = New-Object -ComObject Word.Application
$doc = $word.Documents.Open("C:\wamp64\www\bodhiwebsite\updates\About Us.docx")
$doc.Content.Text | Out-File -FilePath "C:\wamp64\www\bodhiwebsite\updates\about_us_content.txt" -Encoding utf8
$doc.Close()
$word.Quit()

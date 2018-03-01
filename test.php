<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2Fdocentes.cecfuentedevida.net%2Fadmin%2Ffiles%2F180213095807Hoja%2B1.docx");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
curl_close($ch);
//$result = preg_replace("#(<\s*a\s+[^>]*href\s*=\s*[\"'])(?!http)([^\"'>]+)([\"'>]+)#",'$1http://www.your_external_website.com/$2$3', $result);
echo $result;



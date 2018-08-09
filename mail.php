<?php
$empfaenger = "amir.zamani@brandung.de";
$absendername = "XML in Email ";
$absendermail = "email@domain.de";
$betreff = "XML in Anhang";

$text = "Hallo Guido!
Ich Versuche XML in Email Schreiben und Die Wetter Rechner Werte in XML Format dir schicken. .";


$data_xml = "data.xml";
$file = $data_xml;
$file_size = filesize($file);
$xmlfilehandler = fopen($file, "r");
$xmlcontent = fread($filehandler, $file_size);
fclose($filehandler);


$mime_boundary = "-----=" . md5(uniqid(microtime(), true));

$header  ="From:".$absendername."<".$absendermail.">\n";
$header .= "Reply-To: ".$empfaenger."\n";

$header.= "MIME-Version: 1.0\r\n";
$header.= "Content-Type: multipart/mixed;\r\n";
$header.= " boundary=\"".$mime_boundary."\"\r\n";

$encoding = mb_detect_encoding($text, "utf-8, iso-8859-1, cp-1252");
$content = "This is a multi-part message in MIME format.\r\n\r\n";
$content.= "--".$mime_boundary."\r\n";
$content.= "Content-Type: text/html; charset=\"$encoding\"\r\n";
$content.= "Content-Transfer-Encoding: 8bit\r\n\r\n";
$content.= $text."\r\n";


$data = chunk_split(base64_encode($xmlcontent));
$content.= "--".$mime_boundary."\r\n";
$content.= "Content-Disposition: attachment;\r\n";
$content.= "\tfilename=\"".$data_xml."\";\r\n";
$content.= "Content-Length: .".$file_size.";\r\n";
$content.= "Content-Type: application/xml; name=\"".$data_xml."\"\r\n";
$content.= "Content-Transfer-Encoding: base64\r\n\r\n";
$content.= $data."\r\n";

$content .= "--".$mime_boundary."--";

if (mail($empfaenger, $betreff, $content, $header)) {

    echo "Sucessfully send";
}
else
{
    $errorMessage = error_get_last()['message'];
    echo $errorMessage;
}
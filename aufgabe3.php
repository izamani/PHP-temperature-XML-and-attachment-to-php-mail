<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wetter Rechner</title>
</head>
<body>

<?php

/* $filename = 'test.txt';
 $filehandler = fopen($filename, 'r');

 while (!feof($filehandler)) {
    $line = fgets($filehandler);
    $arrtest = explode('|', $line);
     echo "<pre>";
     print_r($arrtest);
     echo "</pre>";

 }
 fclose($filehandler);
*/

$content = file_get_contents('test.txt');
$lines = explode(chr(13), $content);

$arrtemperature = array();
$xml = '<?xml version="1.0" encoding="utf-8"?>';

$xml .= '<document>';
foreach ($lines as $line) {
    $arrtest = explode('|', $line);
    $city = $arrtest[0];
    $temperature = $arrtest[1];

    $xml .= '<item>';
    $xml .= '<title>' . $city . '</title>';
    $xml .= '<temperature>' . $temperature . '</temperature>';
    $xml .= '</item>';

    $arrtemperature [] = $temperature;

}
$xml .= '</document>';

// xml generate
$filehandler = fopen('data.xml', 'w+');

fwrite($filehandler, $xml);
fclose($filehandler);

echo "<pre>";
//print_r($arrtemperature);
echo "</pre>";

$minTemperature = min($arrtemperature);
$maxTemperature = max($arrtemperature);
$sum = array_sum($arrtemperature);


$average = $sum / count($arrtemperature);
echo "<pre>";
echo "<h1>Summe von mindesten, Hochsten und Durchschnitte</h1>"."<hr> MIN: " . ($minTemperature) . "<hr> MAX: " . ($maxTemperature) . "<hr> SUM: " . ($sum). "<hr> Durchschnitt: ". $average;
echo "</pre>";


?>


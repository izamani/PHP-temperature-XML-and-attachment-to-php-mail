<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>
<body>
<?php

error_reporting(1);

$filename = "test.txt";
$filehandler = fopen($filename, 'w+');

for ($counter = 1; $counter <= 30; $counter++) {
    if ($counter === 30) {
        fwrite($filehandler, 'Köln| ' . rand(20, 40). chr(13));
        fwrite($filehandler, 'Berlin |' . rand(20, 40));
    } else {
        fwrite($filehandler, 'Köln |'  . rand(20, 40) . chr(13));
        fwrite($filehandler, 'Berlin |' . rand(20, 40) . chr(13));
    }
}


fclose($filehandler);
?>
</body>
</html>
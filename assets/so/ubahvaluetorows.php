<?php
// Nama file JSON yang akan diolah
// $filePath = 'C:\xampp\htdocs\portal-mki-course\assets\so\api_datasooutstanding.json';
// $filePathheader = 'C:\xampp\htdocs\portal-mki-course\assets\so\api_datasooutstandingheader.json';

// Untuk Web 
$filePath = '/home/portal-mki/web/portal-mki.com/public_html/assets/so/api_datasooutstanding.json';
$filePathheader = '/home/portal-mki/web/portal-mki.com/public_html/assets/so/api_datasooutstandingheader.json';
// Baca isi file JSON
$jsonContent = file_get_contents($filePath);
$jsonContentheader = file_get_contents($filePathheader);

// Kata yang ingin diganti
// $targetWord = 'value';
// $newWord = 'rows';
$targetWord1detail = '{"@odata.context":"http://mitrakiara-bc.com:7048/BusinessCentral/ODataV4/$metadata#Company(\'PT%20Mitra%20Kiara%20Indonesia\')/salesDocumentLines","value":';
$targetWord1header ='{"@odata.context":"http://mitrakiara-bc.com:7048/BusinessCentral/ODataV4/$metadata#Company(\'PT%20Mitra%20Kiara%20Indonesia\')/SalesOrder","value":';

$newWord = '';
$targetWord2 = '}]}';
$newWord2 = '}]';

// Melakukan penggantian kata secara menyeluruh
$jsonContent = str_replace($targetWord1detail, $newWord, $jsonContent);
$jsonContentheader = str_replace($targetWord1header, $newWord, $jsonContentheader);

$jsonContent = str_replace($targetWord2, $newWord2, $jsonContent);
$jsonContentheader = str_replace($targetWord2, $newWord2, $jsonContentheader);

// Menyimpan hasil penggantian ke file
file_put_contents($filePath, $jsonContent);
file_put_contents($filePathheader, $jsonContentheader);


// echo "Kata '$targetWord' berhasil diganti dengan '$newWord' dalam file JSON.";
?>

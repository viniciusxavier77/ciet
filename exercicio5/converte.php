<?php
$filexml='arquivo.xml';
$filecsv = 'arquivo.csv';

if (file_exists($filexml))
{
    $xml = simplexml_load_file($filexml);
    $f = fopen($filecsv, 'w');
    converteXmlParaCsv($xml, $f);
    fclose($f);
    echo "Arquivo convertido com sucesso!";
}

function converteXmlParaCsv($xml,$f)
{
    foreach ($xml->children() as $item) {
        $hasChild = (count($item->children()) > 0) ? true : false;

        if (!$hasChild) {
            $put_arr = array($item->getName(), $item);
            fputcsv($f, $put_arr, ',', '"');
        } else {
            converteXmlParaCsv($item, $f);
        }
    }
}
<?php


$object = new CSVGenerator($model);
$object->setDataProvider($dataProvider);     
$object->setHeader($naglowek); //naglowek jest przekazany przez kontrler
$object->makeDataCSV($raport);
 

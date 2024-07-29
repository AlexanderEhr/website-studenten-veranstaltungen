<?php

require_once '../edv102/include/config.php';
require_once '../edv102/classes/DBUtility.php';
include_once DB_CONNECTION;
//use Project\Classes\DBUtility;

function loadCSVToDatabase($csvFilePath, $db) {
    try {
        // Öffne die CSV-Datei
        if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
            // Überspringe die erste Zeile, wenn sie Header enthält
            fgetcsv($handle, 1000, ",");

            // Lese jede Zeile der CSV-Datei
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $seminarData = [
                    'title' => $data[0],
                    'descriptions' => $data[1],
                    'price' => $data[2],
                    'categories_id' => $data[3],
                    'duration' => "10 days"
                ];

                // Füge die Daten in die Datenbank ein
                if (!DBUtility::insert($db, 'seminars', $seminarData)) {
                    echo "Fehler beim Einfügen des Datensatzes: " . json_encode($seminarData) . "<br>";
                }
            }
            fclose($handle);
            echo "CSV-Datei erfolgreich in die Datenbank geladen.";
        } else {
            echo "Fehler beim Öffnen der CSV-Datei.";
        }
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}


$csvFilePath = __DIR__ . '/../edv102/src/data/seminare.csv';

loadCSVToDatabase($csvFilePath, $db);
?>

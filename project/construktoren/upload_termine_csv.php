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
                $termineData = [
                    'starts' => $data[0],
                    'ends' => $data[1],
                    'seminars_id' => $data[2],
                    'rooms_id' => $data[3]
                ];

                // Füge die Daten in die Datenbank ein
                if (!DBUtility::insert($db, 'events', $termineData)) {
                    echo "Fehler beim Einfügen des Datensatzes: " . json_encode($termineData) . "<br>";
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


$csvFilePath = __DIR__ . '/../edv102/src/data/termine.csv';

loadCSVToDatabase($csvFilePath, $db);
?>

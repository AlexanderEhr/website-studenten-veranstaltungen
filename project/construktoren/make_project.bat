@echo off

:: Hauptverzeichnis erstellen
mkdir klausurproject
cd klausurproject

:: csv-Verzeichnis und Dateien erstellen
mkdir csv

:: Documentation-Verzeichnis und Dateien erstellen
mkdir Documentation

:: project-Verzeichnis und Unterverzeichnisse erstellen
mkdir project
cd project
mkdir construkturen
mkdir edv102

:: Unterverzeichnisse im edv102-Verzeichnis erstellen
cd edv102
mkdir admin
mkdir classes
mkdir css
mkdir include
mkdir src

:: Unterverzeichnise im src erstellen
cd src
mkdir helpers
mkdir photo
mkdir templates
mkdir data

:: Zurück zum Hauptverzeichnis und restliche Dateien erstellen
cd ..\..\..
echo Projektplaninhalt > Project_plan.txt
echo README-Inhalt > README.txt
echo TODO-Inhalt > TODO.txt

echo Projektstruktur erfolgreich erstellt!
pause

<?php
$servername = "localhost"; // MySQL-Server
$username = "root";        // MySQL-Benutzername (Standard für XAMPP)
$password = "";            // MySQL-Passwort (Standard für XAMPP ist ein leeres Passwort)
$dbname = "edv102";

// Verbindung zur MySQL-Datenbank herstellen
$conn = new mysqli($servername, $username, $password);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Datenbank erstellen
$sql = "CREATE DATABASE IF NOT EXISTS $dbname DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Datenbank erfolgreich erstellt<br>";
} else {
    die("Fehler beim Erstellen der Datenbank: " . $conn->error . "<br>");
}

// Datenbank auswählen
$conn->select_db($dbname);

// Tabellen erstellen
$tables = [
    "CREATE TABLE IF NOT EXISTS seminars (
        id INT PRIMARY KEY AUTO_INCREMENT, 
        title VARCHAR(30) UNIQUE NOT NULL,
        descriptions TEXT NOT NULL,
        price DECIMAL(6,2) NOT NULL,
        categories_id INT NOT NULL,
        duration VARCHAR(30) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS events (
        id INT PRIMARY KEY AUTO_INCREMENT,
        seminars_id INT NOT NULL,
        starts DATE,
        ends DATE,
        rooms_id INT NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS student (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(30) NOT NULL,
        given_name VARCHAR(30) NOT NULL,
        family_name VARCHAR(30) NOT NULL,
        street VARCHAR(30) NOT NULL,
        house_number VARCHAR(10) NOT NULL,
        postcode VARCHAR(10) NOT NULL,
        city VARCHAR(40) NOT NULL,
        email VARCHAR(40) NOT NULL,
        register_date DATE,
        login_s VARCHAR(10) NOT NULL,
        password_s VARCHAR(256) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS categories (
        id INT PRIMARY KEY AUTO_INCREMENT,
        category VARCHAR(30) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS rooms (
        id INT PRIMARY KEY AUTO_INCREMENT,
        room VARCHAR(30) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS student_events (
        id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT NOT NULL,
        events_id INT NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS locations (
        id INT PRIMARY KEY AUTO_INCREMENT,
        locations VARCHAR(30) NOT NULL
    )"
];

foreach ($tables as $table) {
    if ($conn->query($table) === TRUE) {
        echo "Tabelle erfolgreich erstellt<br>";
    } else {
        echo "Fehler beim Erstellen der Tabelle: " . $conn->error . "<br>";
    }
}

// Verbindung schließen
$conn->close();
?>

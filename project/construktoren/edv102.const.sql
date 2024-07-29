-- Datenbank
CREATE DATABASE IF NOT EXISTS edvKlausur DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


USE edvKlausur;

-- TABLE seminare
-- seminare = {id, titel, beschreibung, preis, kategorien_id,dauer}

CREATE TABLE IF NOT EXISTS seminars
(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    title VARCHAR(30) UNIQUE NOT NULL,
    descriptions TEXT NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    categories_id INT NOT NULL,
    duration INT NOT NULL
);

-- TABLE termine
-- termine = {id, seminare_id, beginn, ende, raeume_id}

CREATE TABLE IF NOT EXISTS events
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    seminars_id INT NOT NULL,
    starts DATE,
    ends DATE,
    rooms_id INT NOT NULL
);

-- TABLE studenten
-- studenten = {id, anrede, vorname, nachname, strasse, hausnr, plz ,ort, email, mobil, login, passwort}

CREATE TABLE IF NOT EXISTS student
(
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
);

-- TABLE kategorien
-- kategorien = {id, kategorie}

CREATE TABLE IF NOT EXISTS categories
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(30) NOT NULL
);

-- TABLE raeume
-- raeume = {id, raum}

CREATE TABLE IF NOT EXISTS rooms
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    room VARCHAR(30) NOT NULL
);

-- TABLE studenten_termine
-- studenten_termine = {id, studenten_id, termine_id}

CREATE TABLE IF NOT EXISTS student_events
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    events_id INT NOT NULL
);

-- TABLE orte
-- orte = {id, ort}

CREATE TABLE IF NOT EXISTS locations
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    locations VARCHAR(30) NOT NULL
);

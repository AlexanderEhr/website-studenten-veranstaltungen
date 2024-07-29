# KlaussurProject

## Project Description
This project is designed to create and manage a database for seminars and appointments. The project involves setting up a directory structure, 
populating the database, and providing interfaces for uploading CSV files with seminar and appointment data.

Usage Instructions

    Viewing Seminars: You can view the list of seminars without being logged in.
    Registration: Use the navigation to go to the registration page where you can create an account.
    Booking Seminars: Once registered and logged in, you can book seminars using your account.


## Installation Instructions
1. **Navigate to the Constructor Directory:**
   Open the terminal or command prompt and navigate to the `construktoren` directory.

2. **Run the Setup Script:**
   Execute the `make_project.bat` script in the desired directory:
   ```sh
   make_project.bat

This will create the necessary project directories and files.

    Create the Database:
    Open your browser and start XAMPP. Navigate to the desired directory and execute edv102.const.php by accessing the following URL:
    http://localhost/main/CBW_PHPD/klausurprojekt/project/construktoren/edv102.const.php

    Upload CSV Files:
    Under the same URL, execute the following scripts to upload the CSV files:
    http://localhost/main/CBW_PHPD/klausurprojekt/project/construktoren/upload_seminare_csv.php
    http://localhost/main/CBW_PHPD/klausurprojekt/project/construktoren/upload_termine_csv.php

Project Structure
klausurproject/
├── csv/
│   ├── seminare.csv
│   └── termine.csv
├── Documentation/
│   ├── databasecreate.png
│   ├── erstellen_project.png
│   ├── klausurproject.dia
│   ├── klausurproject.dia~
│   ├── OOPklausurproject.dia
│   ├── OOPklausurproject.dia.autosave
│   ├── OOPklausurproject.dia~
│   ├── projektstruktur.txt
│   └── UMLerstellen.png
├── project/
│   ├── construkturen/
│   │   ├── edv102.const.php
│   │   ├── edv102.const.sql
│   │   ├── make_project.bat
│   │   ├── upload_seminare_csv.php
│   │   └── upload_termine_csv.php
│   └── edv102/
│       ├── admin/
│       ├── classes/
│       │   ├── Categories.php
│       │   ├── DBUtility.php
│       │   ├── Events.php
│       │   ├── Location.php
│       │   ├── Rooms.php
│       │   ├── Seminar.php
│       │   ├── Student.php
│       │   └── StudentAppointments.php
│       ├── css/
│       │   ├── global_mobile.css
│       │   └── global.css
│       ├── include/
│       │   ├── config.php
│       │   ├── DBConnection.inc.php
│       │   └── iDatenbank.php
│       ├── src/
│       │   ├── data/
│       │   │   ├── seminare.csv
│       │   │   └── termine.csv
│       ├── helpers/
│       │   ├── autoload.php
│       │   ├── book.php
│       │   ├── loadStyles.php
│       │   ├── logout.php
│       │   └── titleFunktion.php
│       ├── photo/
│       │   ├── campus-welfengarten-videoposter.webp
│       │   └── unihannover.webp
│       └── templates/
│       │   ├── globalFooterHtml.php
│       │   ├── globalHeaderHtml.php
│       │   ├── globalNavbarHtml.php
│       │   └── events.php
│       └── index.php
│       └── login.php
│       └── register.php
│       └── seminars.php
├── Project_plan.txt
├── README.txt
└── TODO.txt


Technologies Used

    PHP
    SQL

Author

Alexander Ehrlich
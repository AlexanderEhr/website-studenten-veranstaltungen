<?php

function loadStyles() {
    // Debugging-Ausgaben
    echo '<!-- ' . GLOBAL_CSS . ' -->';
    echo '<!-- ' . GLOBAL_MOBILE_CSS . ' -->';
   
    

    // Verwenden Sie die bereits definierten Pfade aus der config.php
    echo '<link rel="stylesheet" href="' . GLOBAL_CSS . '">';
    echo '<link rel="stylesheet" href="' . GLOBAL_MOBILE_CSS . '">';

    /* Bedingte Einbindung von CSS-Dateien basierend auf der aktuellen Seite
    $scriptName = basename($_SERVER['SCRIPT_FILENAME'], '.php');
    switch ($scriptName) {
        case 'index':
            echo '<link rel="stylesheet" href="' . GLOBAL_CSS . '">';
            break;
        // Weitere Fälle für andere Seiten hinzufügen
    }*/
}

?>

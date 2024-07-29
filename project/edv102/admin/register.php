<?php

session_start();
require_once __DIR__ . '/include/config.php';
include_once DB_CONNECTION;
include GLOBAL_HEADER_HTML;

// Prüfen, ob das Formular mit der POST-Methode abgesendet wurde.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $required_fields = ['title', 'given_name', 'family_name', 'street', 'house_number', 'postcode', 'city', 'email', 'login_s', 'password_s'];

    // Überprüfen, ob alle erforderlichen Felder ausgefüllt wurden
    $all_fields_filled = true;
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $all_fields_filled = false;
            break;
        }
    }
    if ($all_fields_filled) {
        // Entfernen von eventuell schädlichem Code und Leerzeichen in den Eingaben und Zuweisen zu Variablen.
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $given_name = trim(filter_input(INPUT_POST, 'given_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $family_name = trim(filter_input(INPUT_POST, 'family_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $street = trim(filter_input(INPUT_POST, 'street', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $house_number = trim(filter_input(INPUT_POST, 'house_number', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $postcode = trim(filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $login_s = trim(filter_input(INPUT_POST, 'login_s', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password_s = trim(filter_input(INPUT_POST, 'password_s', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
            exit;
        }

        $password_hash = password_hash($password_s, PASSWORD_DEFAULT);
        
        // Überprüfen, ob die E-Mail bereits existiert.
        $sql = "SELECT * FROM student WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);

        // Stoppt die Ausführung des Skripts, falls die E-Mail oder Nutzername bereits registriert ist.
        if ($stmt->fetch()) {
            echo "Die gewählte E-Mail-Adresse ist bereits registriert. Bitte wählen Sie eine andere.";
            header("Location: register.php");
            exit;
        }
        $sql = "SELECT * FROM student WHERE login_s = :login_s";
        $stmt = $db->prepare($sql);
        $stmt->execute(['login_s' => $login_s]);

        if ($stmt->fetch()) {
            echo "Der gewählte Benutzername ist bereits vergeben. Bitte wählen Sie einen anderen.";
            header("Location: register.php");
            exit;
        }

        // Benutzer in der Datenbank speichern.
        $sql = "INSERT INTO student (title, given_name, family_name, street, house_number, postcode, city, email, register_date, login_s, password_s) 
                VALUES (:title, :given_name, :family_name, :street, :house_number, :postcode, :city, :email, NOW(), :login_s, :password_hash)";
        $stmt = $db->prepare($sql);

        if($stmt->execute([
                'title' => $title,
                'given_name' => $given_name,
                'family_name' => $family_name,
                'street' => $street,
                'house_number' => $house_number,
                'postcode' => $postcode,
                'city' => $city,
                'email' => $email,
                'login_s' => $login_s,
                'password_hash' => $password_hash,
        ])) {
            // Setze die Session-Variablen für den neuen Benutzer
            $_SESSION['student_id'] = $db->lastInsertId();
            $_SESSION['email'] = $email;
            $_SESSION['given_name'] = $given_name;
            $_SESSION['family_name'] = $family_name;

            // Weiterleitung zur Hauptseite nach erfolgreicher Registrierung mit URL-Parameter
            header("Location: index.php?registrierung=erfolg&given_name=" . urlencode($given_name));
            exit;
        }else {
            echo "Es gab ein Problem bei der Registrierung. Bitte versuchen Sie es später erneut.";
        }
    } else {
        echo "Bitte füllen Sie alle Felder aus.";
    }
}


?>
<div class="global-main-div">
<main>
    <div class="register-container-div">
        <h2>Registrieren Sie sich</h2>
        <!-- Registrierungsformular -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" id="title" name="title" required >
            </div>
            <div class="form-group">
                <label for="given_name">Vorname:</label>
                <input type="text" id="given_name" name="given_name" required >
            </div>
            <div class="form-group">
                <label for="family_name">Nachname:</label>
                <input type="text" id="family_name" name="family_name" required>
            </div>
            <div class="form-group">
                <label for="street">Straße:</label>
                <input type="text" id="street" name="street" required>
            </div>
            <div class="form-group">
                <label for="house_number">Hausnummer:</label>
                <input type="text" id="house_number" name="house_number" required>
            </div>
            <div class="form-group">
                <label for="postcode">Postleitzahl:</label>
                <input type="text" id="postcode" name="postcode" required>
            </div>
            <div class="form-group">
                <label for="city">Stadt:</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="login_s">Benutzername:</label>
                <input type="text" id="login_s" name="login_s" required>
            </div>
            <div class="form-group">
                <label for="password_s">Passwort:</label>
                <input type="password" id="password_s" name="password_s" required minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                <small id="passwordHelp" class="form-text text-muted">Ihr Passwort muss mindestens 8 Zeichen lang sein und mindestens einen Großbuchstaben,<br>
                einen Kleinbuchstaben und eine Zahl enthalten.</small>
            </div>
            <div class="form-group">
                <input type="submit" value="Registrieren" class="btn">
            </div>
        </form>
    </div>
</main>
</div>
<?php include GLOBAL_FOOTER_HTML; ?>

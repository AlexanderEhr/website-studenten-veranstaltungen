<?php
session_start();

require_once __DIR__ . '/include/config.php';
include_once DB_CONNECTION;
include GLOBAL_HEADER_HTML;


if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Ungültiges CSRF-Token");
    }

    // Bereinigen und Zuweisen der Benutzereingaben
    $login_s = trim(filter_input(INPUT_POST, 'login_s', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $password_s = trim(filter_input(INPUT_POST, 'password_s', FILTER_SANITIZE_FULL_SPECIAL_CHARS));


    // Überprüfen, ob beide Felder ausgefüllt wurden
    if (!empty($login_s) && !empty($password_s)) {

        // Benutzer in der Datenbank suchen + Fehlerbehandlung
        try{
            $sql = "SELECT id, login_s, password_s, given_name, family_name FROM student WHERE login_s = :login_s";
            $stmt = $db->prepare($sql);
            $stmt->execute(['login_s' => $login_s]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password_s, $user['password_s'])) {
                $_SESSION['student_id'] = $user['id'];
                $_SESSION['login_s'] = $user['login_s'];
                $_SESSION['given_name'] = $user['given_name'];
                $_SESSION['family_name'] = $user['family_name'];
                
                
                echo "Login erfolgreich!";
                header("Location: index.php");
                exit;

            } else {
                echo "Benutzername oder Passwort falsch.";
            }

        }catch(PDOException $e){
            echo "Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.";
        }

    }else {
        echo "Bitte füllen Sie alle Felder aus.";
    }
}

?>
<div class="global-main-div">
<main>
    <div class="container">
        <h2>Login</h2>
        <!-- Login-Formular -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="form-group">
                <label for="login_s">Benutzername:</label>
                <input type="text" id="login_s" name="login_s" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="password_s">Passwort:</label>
                <input type="password" id="password_s" name="password_s" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn">
            </div>
        </form>
    </div>
</main>
</div>
<?php include GLOBAL_FOOTER_HTML; ?>
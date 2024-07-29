<?php
session_start();
require_once __DIR__ . '/../../include/config.php';
include_once DB_CONNECTION;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['student_id'];
    $eventId = $_POST['event_id'];
    echo $studentId;
    echo $eventId;


    if (isset($studentId) && isset($eventId)) {
        $stmt = $db->prepare("INSERT INTO student_events (student_id, events_id) VALUES (?, ?)");
        $success = $stmt->execute([$studentId, $eventId]);

        if ($success) {
            $_SESSION['message'] = 'Buchung erfolgreich!';
        } else {
            $_SESSION['message'] = 'Datenbankfehler.';
        }
    } else {
        $_SESSION['message'] = 'Ungültige Eingabe.';
    }

    header('Location: ../../seminars.php');
    exit;
}
?>

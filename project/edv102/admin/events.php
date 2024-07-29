<?php

session_start();
require_once __DIR__ . "/include/config.php";
include_once DB_CONNECTION;
include GLOBAL_HEADER_HTML;

?>
<div class="global-main-div">
    <main>
        <div class="container">
            <h2>Your Booked Events</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Preis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $student_id = $_SESSION['student_id']; // Angemeldete Studenten-ID
                    

                    $appointments = new StudentAppointments();
                    $results = $appointments->selectAllByStudentId($db, $student_id);
                    
                    if (empty($results)) {
                        echo "No appointments found for student: " . $_SESSION['given_name'];
                    } else {
                        $booked_events = [];
                    }
                        foreach ($results as $result) {
                            $events_id = $result->getEventsId();
                            $events = new Seminar();
                            $booked_event = $events->select($db, $events_id);
                    
                            if ($booked_event) {
                                $booked_events[] = $booked_event;
                            } else {
                                echo "No event found for event ID: " . $events_id . "<br>";
                            }
                        }
                    

                    if (empty($booked_events)) {
                            echo "<tr><td colspan='3'>No appointments found</td></tr>";
                    } else {
                        foreach ($booked_events as $event){
                        echo "<tr>";
                            echo "<td>" . htmlspecialchars($event->getTitle()) . "</td>";
                            echo "<td>" . htmlspecialchars($event->getDescription()) . "</td>";
                            echo "<td>" . htmlspecialchars($event->getDuration()) . "</td>";
                            echo "<td>" . htmlspecialchars($event->getPrice()) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
</main>
</div>
<?php include GLOBAL_FOOTER_HTML; ?>

<?php

session_start();
require_once __DIR__ . '/include/config.php';
include_once DB_CONNECTION;
include GLOBAL_HEADER_HTML;

?>
<div class="global-main-div">
<main>
<div class="seminar-container-div">
    <div>
        <h2>Seminars</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Categories ID</th>
                    <?php if(isset($_SESSION['student_id'])){
                            echo "<th>Price</th>";
                            echo "<th>Action</th>";
                            }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_SESSION['student_id'])):?>
                <div class="alert alert-warning" role="alert">
                        Bitte logge dich ein um preise zu sehen und seminare buschen zu können.
                    </div>
                <?php else:
                    $student = $_SESSION['student_id'];
                endif; ?>
                <?php
                $seminars = new Seminar();
                $results = $seminars->selectAll($db);
                
                if ($results) {
                    foreach ($results as $seminar) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($seminar->getId()) . "</td>";
                        echo "<td>" . htmlspecialchars($seminar->getTitle()) . "</td>";
                        echo "<td>" . htmlspecialchars($seminar->getDescription()) . "</td>";
                        echo "<td>" . htmlspecialchars($seminar->getDuration()) . "</td>";
                        echo "<td>" . htmlspecialchars($seminar->getCategoriesId()) . "</td>";

                        if (isset($_SESSION['student_id'])){
                        echo "<td>" . htmlspecialchars($seminar->getPrice()) . "</td>";
                        echo '<td>
                                <form action="src/helpers/book.php" method="POST">
                                    <input type="hidden" name="student_id" value="'.htmlspecialchars($student).'"> 
                                    <input type="hidden" name="event_id" value="' . htmlspecialchars($seminar->getId()) . '">
                                    <button type="submit" class="btn btn-primary">Buchen</button>
                                </form>
                            </td>';
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No seminars found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</main>
</div>
<?php include GLOBAL_FOOTER_HTML; ?>

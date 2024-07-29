<div>
    <nav>
        <ul>
            <?php if (isset($_SESSION['student_id'])): ?>
                <li class="welcome-message"><a>Willkommen, <?= htmlspecialchars($_SESSION['given_name']); ?>!</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="src/helpers/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Registration</a></li>
            <?php endif; ?>
            <li><a href="seminars.php">Seminars</a></li>
        </ul>
    </nav>
</div>


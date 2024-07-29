
document.addEventListener("DOMContentLoaded", function() {
    const logoutButton = document.querySelector("a[href='src/helpers/logout.php']");

    if (logoutButton) {
        logoutButton.addEventListener("click", function(event) {
            if (!confirm("Möchten Sie sich wirklich abmelden?")) {
                event.preventDefault();
            }
        });
    }
});

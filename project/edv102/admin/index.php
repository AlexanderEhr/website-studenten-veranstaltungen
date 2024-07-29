<?php

session_start();
require_once "include/config.php";
include GLOBAL_HEADER_HTML;

?>
<?php if (isset($_GET['registrierung']) && $_GET['registrierung'] == 'erfolg'): ?>
    <p>Registrierung erfolgreich. Willkommen, <?= htmlspecialchars($_GET['given_name']) ?>!</p>
<?php endif; ?>

<?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
    <p>Logout war erfolgreich.</p>
<?php endif; ?>

<div class="global-main-div">
    <main>
        <div class="index-section-div">
        <section>
            <div>
            <article>
                <p>
                <strong>Hallo liebe Studierende! <br> Hier auf unserer Seite könnt ihr euch für ein breites Angebot an Seminaren eintragen!</strong>
                </p>
            </article>
            </div>
            <div>
            <div>
                <p></p>
            </div>
        </div>
        </section>
        </div>
    </main>
</div>
<?php


include GLOBAL_FOOTER_HTML;


?>
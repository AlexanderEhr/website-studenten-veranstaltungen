<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo getPageTitle(); ?></title> 
    
    <!-- Meta-Tags für SEO und soziale Medien -->
    <meta name="description" content="Eine Seite wo Sudierende sich für veranstaltungen eintragen können">
    <meta name="keywords" content="Studenten, Veranstaltungen, Kreativ">
    <meta name="author" content="Alexander">
    <meta property="og:title" content="Blog Main">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    
    <!-- Viewport Meta-Tag für eine bessere mobile Ansicht -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="icon" href="" type="">

    <?php loadStyles(); ?>
    
    <!-- Weitere CSS-Dateien bei Bedarf einbinden -->
    <script src="src/js/main.js"></script>
</head>
<body>
    <div id="body-container" class="body-page-container">
            <div>
                <header id="site-header-wrapper" class="site-header-wrapper" tabindex="-1">
                    <div id="site-header" class="site-header" tabindex="-1">
                        <div class="header-container">
                            <div class="header-intro-text">
                                <p class="name-text"><a href="../index.php">Studenten Veranstaltungen</a></p>
                            </div>
                            <div>
                                <?php include GLOBAL_NAVBAR_HTML; ?>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
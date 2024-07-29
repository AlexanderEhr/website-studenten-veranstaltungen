<?php
#functions.php

function autoloader(string $param)
{

    if(file_exists("classes/$param.php"))
    {
        require_once "classes/$param.php";
    }

}
spl_autoload_register('autoloader');
?>

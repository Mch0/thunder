
<?php

if ($handle = opendir('guide/img/profileicon')) {

    /* Ceci est la façon correcte de traverser un dossier. */
    while (false !== ($entry = readdir($handle))) {
        if ($entry[0] !== '.') {
            echo "$entry";
            echo "<br>";
        }
    }

    closedir($handle);
}
?>

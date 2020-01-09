<?php
    if (isset($_GET['type'])) {
        if ($_GET['type'] == 'engi') {
            header("Location: ./engi.html");
        } else if ($_GET['type'] == 'pharm') {
            header("Location: ./pharm.html");
        }
    } else {
        header("Location ./engi.html");
    }
?>
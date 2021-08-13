<?php

require '../datas/config.php';

// On vérifie que la page passée en GET existe bien sinon on affiche une 404 personnalisée
if (!empty($_GET['page']))
    $nomPage = file_exists(PAGES_DIR . $_GET['page'] . '.php') ? $_GET['page'] : '404';
else
    $nomPage = 'accueil';  // si aucune page n'est passée en GET, on affiche la page d'accueil

// Définition du code 404
if ($nomPage == '404')
    header("HTTP/1.0 404 Not Found");

// Résultat HTML
include INC_DIR . 'inc_top.php';
include PAGES_DIR . $nomPage . '.php';
include INC_DIR . 'inc_bottom.php';

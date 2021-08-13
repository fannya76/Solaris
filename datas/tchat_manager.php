<?php

require 'liste_salons.php';
require 'messages.php';

session_start();

if (empty($_SESSION['user'])) {
    header('Location: ?page=accueil');
    exit;
}

if (isset($_POST['submit'])) {
    if (!empty($_POST)) {
        $message = htmlspecialchars($_POST['message']);
        $id_user = $_SESSION['user']['ID'];
        $id_salon = $_GET['id_salon'];

        $query = $pdo->prepare('INSERT INTO comments(msg, ID, id_salon) 
        VALUES (:msg, :ID, :id_salon)');
        $query->execute(array(
            'msg' => $message,
            'ID' => $id_user,
            'id_salon' => $id_salon
        ));
        
        header('Location: ?page=tchat&nom_salon=' . $_GET['nom_salon'] . '&id_salon=' . $_GET['id_salon']);
    }
}

?>
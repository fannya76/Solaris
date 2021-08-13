<?php

session_start();

require 'pdo_connect.php';
require 'liste_salons.php';


if (empty($_SESSION)) {
    header('Location: ?page=accueil');
    exit;
}

if (isset($_GET['newPortal'])) { 
        $newPortal = $_GET['newPortal'];
        $message = 'Tu peux à présent rejoindre la zone ' . $newPortal . ' !';
    }

if (isset($_GET['sameName'])) {
    $message = 'Désolé, ce portail existe déjà !';
}

if (isset($_GET['deletePortal'])) { 
    $message = 'Le portail a volé en éclats !';
}


// ************ CREER NOUVEAU SALON / PORTAIL **************

if (isset($_POST['newPortal'])
    && (!empty($_POST['destination']))) {

    $nom_salon = $_POST['destination'];
    $id_user = $_SESSION['user']['ID'];

    // ON VERIFIE QUE LE NOM n'exsiste pas déjà dans BDD
    $query = $pdo->prepare("SELECT * FROM salon WHERE nom_salon = :nom_salon");
    $query->execute(array('nom_salon' => $nom_salon));
    $res = $query->fetchAll();

    if (count($res) > 0) {
        header('Location: ?page=portals&sameName');
        exit;
    }   

    $query = $pdo->prepare('INSERT INTO salon(nom_salon, ID) 
        VALUES (:nom_salon, :ID)');
    $query->execute(array(
        'nom_salon' => $nom_salon,
        'ID' => $id_user,
    ));

    header('Location: ?page=portals&newPortal=' . $nom_salon);
    exit;
}
// ********************************************************** 

// FONCTION QUI VERIFIE QUE L'UTILISATEUR EST BIEN PROPRIETAIRE DU SALON PASSE EN GET, avant modification, suppression

function userIsOwner() {
    $id_salon = $_GET['id_salon'];

    $queryCheckUser = $GLOBALS['pdo']->prepare("SELECT ID FROM salon WHERE id_salon = :id_salon");
    $queryCheckUser->execute(array('id_salon' => $id_salon));
    $resCheckUser = $queryCheckUser->fetch();

    return $resCheckUser['ID'] == $_SESSION['user']['ID'];

}

// **************** MODIFIER NOM DU SALON / PORTAIL

if (isset($_POST['updatePortal'])
    && (!empty($_POST['destination']))) {
       
        
        $id_salon = $_GET['id_salon'];
        $nom_salon = $_POST['destination'];
        
    // ON VERIFIE QUE L'UTILISATEUR EST BIEN PROPRIETAIRE DU SALON
    if(userIsOwner()) {    
        
        // ON VERIFIE QUE LE NOM n'exsiste pas déjà dans BDD
        $query = $pdo->prepare("SELECT * FROM salon WHERE nom_salon = :nom_salon");
        $query->execute(array('nom_salon' => $nom_salon));
        $res = $query->fetchAll();

        if (count($res) > 0) {
            header('Location: ?page=portals&sameName');
            exit;
        }        


        $query = $pdo->prepare('UPDATE salon SET nom_salon = :nom_salon WHERE id_salon =' . $id_salon);
        $query->execute(array('nom_salon' => $nom_salon));

        header('Location: ?page=portals&newPortal=' .$nom_salon);
    }

    else {
        header('Location: ?page=portals');
    }

}

// **************** SUPPRIMER SALON / PORTAIL et donc tous les messages contenus

if (isset($_POST['deletePortal'])) {

    // ON VERIFIE QUE L'UTILISATEUR EST BIEN PROPRIETAIRE DU SALON
    if(userIsOwner()) {   
        
        $id_salon = $_GET['id_salon'];

        $query = $pdo->prepare('DELETE FROM `comments` WHERE `id_salon`= :id_salon');
        $query->execute(array('id_salon' => $id_salon));

        $query = $pdo->prepare('DELETE FROM `salon` WHERE `id_salon`= :id_salon');
        $query->execute(array('id_salon' => $id_salon));

        header('Location: ?page=portals&deletePortal');
    }

    else {
        header('Location: ?page=portals&forbidden');
    }

}

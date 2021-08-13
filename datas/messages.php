<?php

require 'pdo_connect.php';

// $nom_salon = $_GET['nom_salon'];
$id_salon = $_GET['id_salon'];

// ************ RECUPERER TOUS LES MESSAGES D'UN SALON **********************

$query = $pdo->prepare('SELECT comments.msg, date_format(comments.date_heure, "%d/%m/%Y %H:%i"), comments.ID, utilisateur.ID, utilisateur.nom, utilisateur.prenom 
FROM `comments` JOIN utilisateur ON comments.ID = utilisateur.ID WHERE id_salon = :id_salon');
$query->execute(array('id_salon' => $id_salon));
$tab_msg = $query->fetchAll(PDO::FETCH_ASSOC);

$nb_msg = count($tab_msg);


?>

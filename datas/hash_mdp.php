<?php

$con = mysqli_connect("localhost","root","","space_chat"); // Connexion à la base de données

$query = mysqli_query($con, 'SELECT * FROM utilisateur WHERE ID IN (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)'); // execute la requete qui récupère les users de la bdd
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);  // crée un tab associatif avec la bdd récupérée
// $users = mysqli_fetch_row($query);  // crée un tab associatif avec la bdd récupérée


foreach($users as $key => $user_datas )
{
    $hashmdp = password_hash($user_datas['mot_de_passe'], PASSWORD_DEFAULT);
    $requete = "UPDATE utilisateur SET mot_de_passe = '$hashmdp' WHERE ID = " . $user_datas['ID'];
    $query = mysqli_query($con, $requete); // execute la query qui hash tous les mdp de la bdd
}

?>

<!-- BIEN VERIFIER LES NOMS DES CHAMPS DE DONNEES !!! -->

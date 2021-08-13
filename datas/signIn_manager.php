<?php
require "pdo_connect.php";

$message = '';

if (isset($_GET['code'])) {

    if ($_GET['code'] == 'max3M') {
        $message = "La taille de fichier maximum est de 3M";
    }
    if ($_GET['code'] == 'file') {
        $message = 'Ce nom de fichier existe déjà';
    }
    if ($_GET['code'] == 'mail') {
        $message = 'Cet email existe déjà';
    }
}

if (isset($_POST['submit'])) {

    if (!empty($_POST)) {

        $email_input = $_POST['user']['email'];

        $query = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $query->execute(array('email' => $email_input));
        $user_array = $query->fetchAll(PDO::FETCH_ASSOC);


        if (count($user_array) > 0) {
            header('Location: ../pages/signIn?code=mail');
            exit;
        }        

        if ($_FILES['avatar']['error'] == 0) {  // si le fichier a bien été uploadé 
            
            $dossierDestination = 'uploads/';
            
            if (!file_exists($dossierDestination . $_FILES['avatar']['name'])) { // si le fichier n'est pas un doublon
                
                $taille_max    = 3145728;
                $taille_fichier = $_FILES['avatar']['size'];
                
                if ($taille_fichier < $taille_max) {   // si la taille de fichier est inférieure à 3M
                    
                    
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dossierDestination . basename($_FILES['avatar']['name']));
                    
                    $nom = htmlspecialchars(($_POST['user']['nom']));
                    $prenom = htmlspecialchars(($_POST['user']['prenom']));
                    $email = htmlspecialchars(($_POST['user']['email']));
                    $mdp = password_hash(htmlspecialchars(($_POST['user']['password'])), PASSWORD_DEFAULT);
                    $url_avatar = $_FILES['avatar']['name'];
                    
                    $query = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, url_avatar) VALUES (:nom, :prenom, :email, :mot_de_passe, :url_avatar)");
                    $query->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'mot_de_passe' => $mdp,
                        'url_avatar' => $url_avatar
                    ));
    
                    if ($query->rowCount() > 0) {  
                        header('Location: ?page=accueil&code=wellSigned');
                        exit;
                    }
                }
                else {
                    header('Location: ?page=signIn&code=max3M');
                    exit;
                }
            }
            else {
                header('Location: ?page=signIn&code=file');
                exit;
            }  
        } 
    } 
}

?>

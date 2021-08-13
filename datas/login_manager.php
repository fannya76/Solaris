<?php

include 'pdo_connect.php';

session_start();

$well_signed = '';
$message = '';

if (isset($_GET['code'])) {

    if ($_GET['code'] == 'wellSigned') {
        $well_signed = 'Te voilà prêt à décoller !';
    }
    if ($_GET['code'] == 'mail') {
        $message = 'Cet email est invalide';
    }
    if ($_GET['code'] == 'mdp') {
        $message = 'Le mot de passe est incorrect';
    }
    if ($_GET['code'] == 'empty') {
        $message = 'Veuillez entrer vos identifiants';
    }
}

if (isset($_POST['submit'])) {

    if (empty($_POST['email']) || empty($_POST['password'])) {

        header('Location: ?page=accueil&code=empty');
        exit;
    } else {

        $email_input = htmlspecialchars(($_POST['email']));
        $mdp_input = htmlspecialchars(($_POST['password']));

        $query = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $query->execute(array('email' => $email_input));
        $user_array = $query->fetch(PDO::FETCH_ASSOC);
              
        if ($user_array && filter_var($email_input, FILTER_VALIDATE_EMAIL)) {

            if (password_verify($mdp_input, $user_array['mot_de_passe'])) {

                $_SESSION['user'] = $user_array;
                header('Location: ?page=portals');
                exit;

            } else {
                header('Location: ?page=accueil&code=mdp');
            }

        } else {
            header('Location: ?page=accueil&code=mail');
            exit;
        }
    }
}

$pdo = null;

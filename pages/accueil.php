<?php
include '../datas/login_manager.php';

if (isset($_GET['logout'])) {
    session_destroy();
}

?>

<body class="body_index">

    <h3 class="h3_home h3_index">SOLARIS <br><span class="subTitle">Messagerie Stellaire</span></h3>


    <div id="box_form">

        <h2><?= $well_signed ?></h2>

        <form class="login" method="POST">
            <p class="box_Form_Title">Identifie-toi</p>

            <label for="email">Arobase @</label>
            <input type="email" name="email" id="email" class="champs" required>

            <label for="mdp">Code Secret</label>

            <div class="mdp_eye">
                <input type="password" name="password" id="mdp" class="champs eye_mdp" required>

                <i class="fas fa-eye"></i>
                <i class="fas fa-eye-slash"></i>
            </div>

            <input type="submit" value="Go !" name="submit">
            <hr>
            <p>Pas d'accès ?<a href="?page=signIn"> Rejoins la flotte !</a></p>
            <p class="erreur"><?= $message ?></p>

        </form>
    </div>


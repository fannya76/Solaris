<?php
include '../datas/signIn_manager.php';
?>

<body class="body_signIn">

    <a href="?page=accueil">
        <h3 class="h3_home h3_signIn">SOLARIS</h3>
    </a>

    <div id="box_form" class="joinUs">
        <form method="POST" enctype="multipart/form-data" class="signIn">

            <p class="box_Form_Title">Rejoins la flotte !</p>

            <label for="nom">Ton Nom de Code</label>
            <input type="text" name="user[nom]" id="nom" class="champs" maxlength ="30" required>

            <label for="prenom">Ton Vaisseau</label>
            <input type="text" name="user[prenom]" id="prenom" class="champs" maxlength ="30" required>

            <label for="email">Ton Arobase @</label>
            <input type="email" name="user[email]" id="email" class="champs" maxlength ="50" required>

            <label for="mdp">Ton Code Secret</label>
            <div class="mdp_eye">
                <input type="password" name="user[password]" id="mdp" class="champs eye_mdp sign_mdp" pattern=".{8,}" maxlength ="30" title="Au moins 8 caractères" required>

                <i class="fas fa-eye"></i>
                <i class="fas fa-eye-slash"></i>
            </div>

            <label for="mdp2">Retape ton Code Secret</label>
            <div class="mdp_eye">
                <input type="password" name="user[password2]" id="mdp2" class="champs eye_mdp sign_mdp" pattern=".{8,}" maxlength ="30" required>
            </div>

            <label for="avatar">Cliché de ton vaisseau<br>
                <span class="option">(optionnel - 3M max)</span> 
            </label>
            <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg" class="champs">

            <input type="submit" value="Go !" name="submit">
            <hr>
            <p>Déjà membre ?<a href="?page=accueil"> Identifie-toi !</a></p>


            <p class="erreur"><?= $message ?></p>

        </form>
    </div>
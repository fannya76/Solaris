<?php

include '../datas/actionP_manager.php';

?>

<body>
    <main>
        <header class="header_home">

            <h3 class="h3_home">SOLARIS</h3>
         
        </header>

        <!-- --------------------------------------------------------------------- -->
        <!-- --------------- MODIFIER-SUPPRIMER SALON / PORTAIL ----------- -->

        <section class="main_action_portal">
            <form method="POST" class="login action_portal">

                <p class="box_Form_Title">Portail  vers<br> <?= $_GET['nom_salon'] ?></p>

                <label for="destination">Renommer la destination</label>
                <p class="infoCom">Les communications seront conservées</p>
                <input type="text" name="destination" id="destination" class="champs">

                <input type="submit" value="Régénérer !" name="updatePortal">
                <p class="erreur">
                    <?= (isset($message) ? $message : '') ?>
                </p>
                <hr>
                <label for="suppression">Supprimer le portail</label>
                <p class="infoCom red">Les communications seront
                    <br>effacées !</p>
                <input type="submit" value="Destruction !" name="deletePortal">

                <a href="?page=portals"><p>Abandonner</p></a>
                

            </form>

        </section>
    </main>

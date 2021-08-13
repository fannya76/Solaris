<?php

include '../datas/actionP_manager.php';

?>

<body class="body_home">
    <header class="header_home">

        <h3 class="h3_home">SOLARIS</h3>

        <a href="?page=accueil&logout">
            <p class="h3_logout nom_salon">Quitter l'Hyper Espace</p>
        </a>

    </header>

    <!-- ----------------- BOUTON AJOUTER NOUVEAU SALON / PORTAIL et msg new Portail bien créé ---------->

    <section>

        <div class="nom_salon btn_new_portal">Générer un portail</div>

        <p><?= (isset($message) ? $message : '') ?></p>

        <!-- ------------------------------------------------------------------->
        <!-- ----------------- AFFICHER LES SALONS / PORTAILS ------------------>

        <section class="Liste_Salons">

            <?php
            foreach ($tab_salons as $key => $tab_salon) { ?>
                <div class="div_Salons">

                    <a href="?page=tchat&nom_salon=<?= $tab_salon['nom_salon'] ?>&id_salon=<?= $tab_salon['id_salon'] ?>">

                        <p class="nom_salon"><?= $tab_salon['nom_salon'] ?></p>
                    </a>

                    <!----------------------------------------------------------------------------------------------->
                    <!---------- BOUTON MODIFIER / SUPPRIMER si user possède salon / portail--------------------------->

                    <?php

                    if ($tab_salon['ID'] == $_SESSION['user']['ID']) { ?>

                        <a href="?page=action_portals&nom_salon=<?= $tab_salon['nom_salon'] ?>&id_salon=<?= $tab_salon['id_salon'] ?>" title="Régénérer/Détruire">

                            <i data-feather="aperture" class="btn_action_portal" ></i>
                        </a>

                    <?php } else { ?>

                        <div title="Ce portail ne vous appartient pas"><i data-feather="aperture" class="btn_action_portal inactif"></i></div>

                    <?php } ?>
                </div>

            <?php } ?>

        </section>

    </section>

    <!-- ------------------------------------------------------------------ -->
    <!-- --------------- MODALE AJOUTER NOUVEAU SALON / PORTAIL ----------- -->

    <section class="modale_new_portal">
        <form class="login new_portal" method="POST">

            <p class="box_Form_Title">Générer un portail</p>

            <label for="destination">Destination</label>
            <input type="text" name="destination" id="destination" class="champs" required>

            <input type="submit" value="Générer !" name="newPortal">
            <hr>

            <a href="">
                <p>Abandonner</p>
            </a>
            <!-- <p class="erreur"><= (isset($message) ? $message : '') ?></p> -->

        </form>
    </section>
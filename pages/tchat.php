<?php

include '../datas/tchat_manager.php';

include '../datas/pdo_connect.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
</script>

<body>
    <main>
        <div class="fixedAside">
            <aside>
                <div class="div_Title_NavSalon">
                    <a href="?page=portals">
                        <h2>SOLARIS</h2>
                    </a>
                </div>

                <p>Vaisseau
                    <br><span class="starship"><?= strtoupper($_SESSION['user']['prenom']) ?></span>
                </p>

                <div class="avatar">
                    <img src="<?= 'uploads/' . $_SESSION['user']['url_avatar'] ?>" class="pic_avatar" alt="image avatar">
                </div>

                <div class="picSpace">
                    <img src="https://source.unsplash.com/collection/3467327/260x320" width="300" height="300" class="random_pic" loading="lazy" alt="image espace">
                </div>

                <p id="msg_in_bdd"> </p>

                <div class="fixedBottom">
                    <p class="p_fixedBottom" id="p_non_lus"></p>

                    <a href="?page=tchat&nom_salon=<?= $_GET['nom_salon'] ?>&id_salon=<?= $_GET['id_salon'] ?>">
                        <div class="capcom" title="Afficher les nouveaux messages">CapCom</div>
                    </a>
                </div>
            </aside>
        </div>

        <section class="ExceptAside">
            <header class="header_tchat">
                <h1><span class="user_signedIn"><?= $_SESSION['user']['nom'] ?></span>,
                    tu navigues dans la zone <span class="auteur"><?= $_GET["nom_salon"] ?></span></h1>

                <div class="ghostHeader">
                    <h2><span class="user_signedIn"><?= $_SESSION['user']['nom'] ?></span>
                        <p><span class="small"> Vaisseau <?= strtoupper($_SESSION['user']['prenom']) ?></span></p>
                        Zone <span class="auteur"><?= $_GET['nom_salon'] ?></span>
                    </h2>

                    <a href="?page=portals" class="btn_action_portal back_to_solaris" title="Revenir à Solaris">S</a>
                </div>

            </header>

            <div class="AllMessages">
                <div>
                    <?php
                    foreach ($tab_msg as $key => $msg) {

                        if ($msg['nom'] == $_SESSION['user']['nom']) {
                            $pseudo = 'user_signedIn';
                        } else {
                            $pseudo = 'auteur';
                        } ?>

                        <div>
                            <span class="<?= $pseudo ?>"><?= $msg['nom'] . ' ' ?></span>
                            <span class="starship"><?= '&nbsp; Vaisseau ' . strtoupper($msg['prenom']) . ' ' ?></span>
                            <br><span class="date"><?= $msg['date_format(comments.date_heure, "%d/%m/%Y %H:%i")'] ?></span>
                            <div>
                                <p class="msg"><?= $msg['msg'] ?></p><br>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>


            <div class="divWriteMessage">

                <form method="POST" class="form_WriteMsg">
                    <!-- <textarea name="message" >Communications...</textarea>
                    <button type="submit" name="submit"><i data-feather="navigation"></i></button> -->
                    <input type="text" name="message" placeholder="Communications..." class="inputMessage" required>
                    <button type="submit" name="submit"><i data-feather="navigation"></i></button>

                    <div class="ghostAntenna">
                    <a href="?page=tchat&nom_salon=<?= $_GET['nom_salon'] ?>&id_salon=<?= $_GET['id_salon'] ?>">
                        <p id="ghost_non_lus"></p>
                    </a>

                    </div>
                </form>
            </div>
        </section>
    </main>

    <script>
        // ON RECUPERE TOUTES LES 3 SECONDES LE NB DE MESSAGES EN BDD pour le salon courant
        // on l'ajoute dans le DOM en display 'none'
        // on récupère aussi le nb de msg dans le DOM
        // on soustrait pour avoir le nb de msg non lus
        // on affiche ce nombre

        $(document).ready(function() {
            // on affiche le nb de messages en bdd dans une balise en display : none
            $('#msg_in_bdd').load('http://solaris-fannya.ml/msg_in_bdd.php?id_salon=<?= $_GET['id_salon'] ?>')
            setInterval(function() {
                $('#msg_in_bdd').load('http://solaris-fannya.ml/msg_in_bdd.php?id_salon=<?= $_GET['id_salon'] ?>')

                // On récupère le nb de messages affichés dans le DOM
                let msg = document.getElementsByClassName('msg');
                let nb_msg_dom = msg.length;

                // On récupère le nb de messages en bdd 
                let msg_in_bdd = document.getElementById('msg_in_bdd');
                let nb_in_bdd = parseInt(msg_in_bdd.innerHTML, 10);

                // On soustrait le nb de msg en bdd du nb de msg ds le DOM
                let msg_non_lus = nb_in_bdd - nb_msg_dom;

                // On affiche ce nombre dans une balise <p> en mode desktop et en vue <800px
                let p_non_lus = document.getElementById('p_non_lus')
                let ghost_non_lus = document.getElementById('ghost_non_lus')

                if (msg_non_lus > 0) {
                    p_non_lus.textContent = msg_non_lus + ' nouveau/x message/s'
                    ghost_non_lus.style.backgroundColor = '#e7492d'
                    ghost_non_lus.textContent = msg_non_lus
                } else {
                    p_non_lus.textContent = 'Pas de nouveaux messages'
                    ghost_non_lus.style.backgroundColor = 'grey'
                    ghost_non_lus.textContent = '0'

                }
            }, 3000);
        });
    </script>

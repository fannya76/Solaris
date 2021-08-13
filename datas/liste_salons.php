<?php

require 'pdo_connect.php';

$query = $pdo->query('SELECT * FROM `salon` ORDER BY id_salon DESC');

$tab_salons = $query->fetchAll(PDO::FETCH_ASSOC);

?>

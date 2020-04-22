<?php
$tab = file_get_contents('../../commun.json');
$objet = json_decode($tab, true);
var_dump($objet);
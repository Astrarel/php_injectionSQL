<?php

require_once "../Model/Bdd.php";

$bdd = new Bdd;
if((isset($_POST['username']) && ($_POST['username'] != '')) &&
    (isset($_POST['password']) && ($_POST['password'] != ''))
    ){
$connexion = $bdd->getConnexion();
}

require "../View/index/index_view.php"

?>
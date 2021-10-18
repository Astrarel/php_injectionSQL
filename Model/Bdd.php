<?php 

Class Bdd {
    
    private $bdd ;

    function __construct() {

        try {

            $this->bdd = new PDO("mysql:dbname=employer;host=localhost","root", "root");
            

        } catch (PDOException $e){

            echo $e->getMessage();

        }

    }

    function getConnexion() {
        $password_hash = sha256($_POST['password']);

        //Ce code est utilisé la plupart du temps, mais c'est le plus vulnérable aux injections SQL, il faut utiliser la fonction prepare et execute de la classe PDO.
        //$reponse = $db->query('SELECT * FROM user WHERE username = \''.$_POST['username'].'\' AND password = \''.$password_hash.'\''); 
        //echo $query;

        $reponse = $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password'); //Ici on prépare la commande SQL en indiquant bien avec des marqueurs indicatifs là où les données devront se placer.
        $reponse->execute(array('username' => $_POST['username'], 'password' => $password_hash)); //Ici les données vont se placer dans la requête afin de l'exécuter en toute sécurité.
        $user = $reponse->fetch();
    }
}

?>
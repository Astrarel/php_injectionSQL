<?php

// Pour exécuter le test, il faut rentrer dans le terminal la commande suivante : ./vendor/bin/phpunit 

class InjectionTest extends \PHPUnit\Framework\TestCase {

    public function test_unNomUnique_trouverUtilisateur_devraitRetournerLeLclient()
    {
        $bdd = new Model\Bdd.php();
        $Nomuser = new Controller\Nom('Jalel');
        $this->assertEquals(1,'Ligne de commande pour savoir si $Nomuser contitent le prénom Jalel','il doit contenir le prénom Jalel');
    }

    public function test_doublonDeNom_trouverParNom_devraitRetournerLesDeuxClients(){

        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom('Kyllian');
        $this->assertEquals(2,'Ligne de commande pour savoir si $Nomuser contitent deux fois le prénom Kyllian','il doit contenir deux fois le prénom Kyllian');
    }

    public function test_aucunNom_trouverParNom_devraitRetournerZeroClient()
    {
        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom('Toto');
        $this->assertEquals(0,'Ligne de commande pour savoir si $Nomueser contitent le prénom Toto','il ne doit avoir aucun utilisateur Toto');
    }

    public function test_injection_trouverparnom_devraitrenvoyerZeroClient(){

        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom("Pirate or '1' = '1'");
        $this->assertEquals(0,'Ligne de commande pour savoir si $Nomuser contient le prénom Kyllian','Injection réussi');
    }
}
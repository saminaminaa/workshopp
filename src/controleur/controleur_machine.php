<?php

function actionGestionmachines($twig,$db){
    $form = array();
    $machine = new Machine($db);
    if(isset($_GET['id'])){
        $exec=$machine->delete($_GET['id']);
        if (!$exec){
            $form['valide'] = false;
            $form['message'] = 'Problème de suppression dans la table produit';
        }
        else{
            $form['valide'] = true;
            $form['message'] = 'Produit supprimé avec succès';
        }
    }

    $listeMachine = $machine->select();
    if (isset($_POST['btAjouter'])) {
        $Nom = $_POST['Nom'];
        $form['valide'] = true;
        $exec = $machine->insert($Nom);
        if (!$exec) {
            $form['valide'] = false;
            $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
        }

        $form['Nom'] = $Nom;
    }
    echo $twig->render('gestionmachines.html.twig', array('listeMachine'=>$listeMachine));
}


function actionConsoMachine($twig,$db){
    $form = array();
    $form['Calcul'] = false;
    $machine = new Machine($db);
    $utilisateur = new Utilisateur($db);
    $listeMachine = $machine->select();
    $Energie = NULL;
    $Prix = NULL;

    if(isset($_POST['btCalcul'])){
        $form['Calcul']= true;
        $Machine = $_POST["Machine"];
        $Puissance = $_POST["Puissance"];
        $Day = $_POST["Day"];
        $Year = $_POST["Year"];

        $Puissance = floatval($Puissance);
        $Day = floatval($Day);
        $Year = floatval($Year);

        $Energie = ($Puissance * $Day * $Year)/1000;

        $Energie = floatval($Energie);
        $Prix = $Energie * 0.1798;
        $unUtilisateur = $utilisateur->selectByEmail($_SESSION["login"]);

        $exec = $machine->insertConso($unUtilisateur['id'],$Machine,$Puissance,$Day,$Year,$Energie,$Prix);
    }
    echo $twig->render('consoMachine.html.twig', array('listeMachine'=>$listeMachine,'Energie'=>$Energie, 'Prix'=>$Prix,'form'=>$form));

}
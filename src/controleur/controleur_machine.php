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
    $machine = new Machine($db);
    $listeMachine = $machine->select();

    if(isset($_POST['btCalcul'])){
        $Machine = $_POST["Machine"];
        $Puissance = $_POST["Puissance"];
        $Day = $_POST["Day"];
        $Year = $_POST["Year"];

        $Puissance = floatval($Puissance);
        $Day = floatval($Day);
        $Year = floatval($Year);

        $Energie = ($Puissance * $Day * $Year)/1000;
        print($Energie);

        if($Energie != NULL){
            
        }


    }
    echo $twig->render('consoMachine.html.twig', array('listeMachine'=>$listeMachine));

}
<?php
function actionGestionmachines($twig,$db){
    $form = array();
    $machine = new Machine($db);
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
<?php

function actionInscription($twig,$db){
    $form = array();
    if (isset($_POST['btInscrire'])){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $Password2 =$_POST['Password2'];
        $Role = $_POST['Role'];
        $form['valide'] = true;
        if ($Password!=$Password2){
            $form['valide'] = false;
            $form['message'] = 'Les mots de passe sont différents';
        }
        else{
            $utilisateur = new Utilisateur($db);
            $exec = $utilisateur->insert($Email, password_hash($Password, PASSWORD_DEFAULT), $Role);
            if (!$exec){
                $form['valide'] = false;
                $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
            }
        }
        $form['email'] = $Email;
        $form['role'] = $Role;
    }
    echo $twig->render('inscription.html.twig', array('form'=>$form));

}

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

function actionConnexion($twig, $db){
    $form = array();
    $form['valide'] = true;
    if (isset($_POST['btConnecter'])){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $utilisateur = new Utilisateur($db);
        $unUtilisateur = $utilisateur->connect($Email);
        if ($unUtilisateur!=null){
            if(!password_verify($Password,$unUtilisateur['Password'])){
                $form['valide'] = false;
                $form['message'] = 'Login ou mot de passe incorrect';
            }
            else{
                $_SESSION['login'] = $Email;
                $_SESSION['role'] = $unUtilisateur['idRole'];
                header("Location:index.php");
            }
        }
        else{
            $form['valide'] = false;
            $form['message'] = 'Login ou mot de passe incorrect';

        }
    }
    echo $twig->render('connexion.html.twig', array('form'=>$form));
}

function actionDeconnexion($twig){
    session_unset();
    session_destroy();
    header("Location:index.php");
}
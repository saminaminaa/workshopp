<?php

function actionAccueil($twig) {
    echo $twig->render('index.html.twig', array());
}

function actionConnexion($twig){
    echo $twig->render('connexion.html.twig',array());
}


function actionConsommation($twig){
    echo $twig->render('MaConso.html.twig', array());
}

function actionAjoutmachine($twig){
    echo $twig->render('ajoutmachine.html.twig', array());
}

function actionApropos($twig){
    echo $twig->render('apropos.html.twig', array());
}

function actionListeutilisateur($twig){
    echo $twig->render('listeutilisateur.html.twig', array());
}

function actionModifmachine($twig){
    echo $twig->render('modifmachine.html.twig', array());
}

function actionProfil($twig){
    echo $twig->render('profil.html.twig', array());
}

function actionUtilisateurs($twig){
    echo $twig->render('utilisateurs.html.twig', array());
}

function actionModifprofil($twig){
    echo $twig->render('modifprofil.html.twig', array());
}


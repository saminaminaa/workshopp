<?php

function actionAccueil($twig) {
    echo $twig->render('index.html.twig', array());
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

function actionGestionmachines($twig){
    echo $twig->render('gestionmachines.html.twig', array());
}


function actionListeutilisateur($twig){
    echo $twig->render('listeutilisateur.html.twig', array());
}

function actionModifmachine($twig){
    echo $twig->render('modifmachine.html.twig', array());
}


function actionUtilisateurs($twig){
    echo $twig->render('utilisateurs.html.twig', array());
}

function actionMentionlegales($twig){
    echo $twig->render('mentionlegales.html.twig', array());
}




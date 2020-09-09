<?php

function actionAccueil($twig) {
    echo $twig->render('index.html.twig', array());
}

function actionConnexion($twig){
    echo $twig->render('connexion.html.twig',array());
}

function actionInscription($twig){
    echo $twig->render('inscription.html.twig', array());
}
function actionConsommation($twig){
    echo $twig->render('MaConso.html.twig', array());
}


<?php

function actionAccueil($twig) {
    echo $twig->render('index.html.twig', array());
}

function actionInsription($twig) {
    echo $twig->render('inscription.html.twig', array());
}
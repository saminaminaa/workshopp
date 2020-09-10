<?php
function getPage($db)
{

    $lesPages['accueil'] = "actionAccueil";
    $lesPages['connexion'] = "actionConnexion";
    $lesPages['inscription'] = "actionInscription";
    $lesPages['MaConso'] = "actionConsommation";
    $lesPages['gestionmachines'] = "actionGestionmachines";
    $lesPages['apropos'] = "actionApropos";
    $lesPages['listeutilisateur'] = "actionListeutilisateur";
    $lesPages['modifmachine'] = "actionModifmachine";
    $lesPages['profil'] = "actionProfil";
    $lesPages['utilisateurs'] = "actionUtilisateurs";
    $lesPages['deconnexion'] = "actionDeconnexion";
    $lesPages['calculconso'] = "actionCalculConso";


    if ($db != null) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'accueil';
    }

    if (!isset($lesPages[$page])) {
        $page = 'accueil';
    }
    /* $explose = explode(";", $lesPages[$page]); // Nous découpons la ligne du tableau sur le  // caractère « ; » Le résultat est stocké dans le tableau $explose
    $role = $explose[1]; // Le rôle est dans la 2ème partie du tableau $explose
    if ($role != 0) { // Si mon rôle nécessite une vérification
        if (isset($_SESSION['login'])) {  // Si je me suis authentifié
            if (isset($_SESSION['role'])) {  // Si j’ai bien un rôle
                if ($role != $_SESSION['role']) { // Si mon rôle ne correspond pas à celui qui est nécessaire //pour voir la page
                    $contenu = 'actionAccueil';  // Je le redirige vers l’accueil, car il n’a pas le bon rôle
                } else {
                    $contenu = $explose[0];
                    // Je récupère le nom du contrôleur, car il a le bon rôle
                }
            } else {
                $contenu = 'actionAccueil';
            }
        } else {
            $contenu = 'actionAccueil';  // Page d’accueil, car il n’est pas authentifié
=======
    $lesPages['modifprofil'] = "actionModifprofil";
    $lesPages['gestionmachines'] = "actionGestionmachines";
    $lesPages['consoMachine'] = "actionConsoMachine";
    $lesPages['mentionlegales'] = "actionMentionlegales";
    $lesPages['maintenance']= "actionMaintenance";



    if ($db!=null){
        if(isset($_GET['page'])){
            // Nous mettons dans la variable $page, la valeur qui a été passée dans le lien
            $page = $_GET['page']; }
        else{
            // S'il n'y a rien en mémoire, nous lui donnons la valeur « accueil » afin de lui afficher une page
            //par défaut
            $page = 'accueil';
>>>>>>> 85599c49e2988766a7f8b7a8408d71fff86ac355
        }
        if (!isset($lesPages[$page])){
            // Nous rentrons ici si cela n'existe pas, ainsi nous redirigeons l'utilisateur sur la page d'accueil
            $page = 'accueil';
        }
        $contenu = $lesPages[$page];
    }
    else{
        $contenu = $lesPages['maintenance'];
    }

*/
        $contenu = $lesPages[$page];

    } else {
        $contenu = $lesPages['actionMaintenance'];
    }

// La fonction envoie le contenu
    return $contenu;
}
?>
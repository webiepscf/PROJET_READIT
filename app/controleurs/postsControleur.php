<?php
/*
  ./app/controleurs/postsControleur.php
 */

namespace App\Controleurs\PostsControleur;
use \App\Modeles\PostsModele;

/**
 * [indexAction description]
 * @param  PDO    $connexion [description]
 */
function indexAction(\PDO $connexion) {
  // Je mets dans $posts la liste des 10 derniers posts que je demande au modèle
    include_once '../app/modeles/postsModele.php';
    $posts = PostsModele\findAll($connexion);

  // Je charge la vue posts/index dans $content
    GLOBAL $title, $content;
    $title = "Blog";
    ob_start();
      include '../app/vues/posts/index.php';
    $content = ob_get_clean();
}

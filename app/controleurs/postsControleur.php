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

function showAction(\PDO $connexion, int $id) {
  // Je mets dans $post les infos du post que je demande au modèle
    include_once '../app/modeles/postsModele.php';
    $post = PostsModele\findOneById($connexion, $id);

  // Je mets dans $author les infos de l'auteur du post que je demande au modèle authorModele
    include_once '../app/modeles/authorsModele.php';
    $author = \App\Modeles\AuthorsModele\findOneById($connexion, $post['author_id']);

  // Je charge la vue show dans $content
    GLOBAL $content, $title;
    $title = $post['title'];
    ob_start();
      include '../app/vues/posts/show.php';
    $content = ob_get_clean();
}

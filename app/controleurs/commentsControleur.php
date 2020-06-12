<?php
/*
  ./app/controleurs/commentsControleur.php
 */

namespace App\Controleurs\CommentsControleur;
use \App\Modeles\CommentsModele;


/**
 * [indexByPostIdAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $postId    [description]
 * @return [type]            [description]
 */
function indexByPostIdAction(\PDO $connexion, int $postId) {
  // Je mets dans $comments la liste des commentaires du post que je demande au modèle
    include_once '../app/modeles/commentsModele.php';
    $comments = CommentsModele\findAllByPostId($connexion, $postId);

  // Je charge la vue comments/indexByPostId directement (pas dans $content)
    include '../app/vues/comments/indexByPostId.php';
}

function storeAction(\PDO $connexion) {
  // Je demande au modèle d'ajouter le commentaire
  // Et de me retourner l'identifiant de ce nouveau commentaire
  // Que je mets dans $id
    include_once '../app/modeles/commentsModele.php';
    $id = CommentsModele\insertOne($connexion);

  // Je redirige vers le post
    header('location: ?postId=' . $_POST['post_id']);

  // GLOBAL $content, $title;
  // $title = "Thanks $_POST['pseudo']";
  // ob_start();
  //   include '../app/vues/comments/store.php';
  // $content = ob_get_clean();
}

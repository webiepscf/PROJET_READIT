<?php
/*
  ./app/modeles/tagsModele.php
 */
namespace App\Modeles\TagsModele;


/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
function findAll(\PDO $connexion) :array {
  $sql = "SELECT t.id, t.name, COUNT(pht.post_id) AS nbrePosts
          FROM tags t
          LEFT JOIN posts_has_tags pht ON pht.tag_id = t.id
          GROUP BY t.id
          ORDER BY COUNT(pht.post_id) DESC;";
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * [findAllByPostId description]
 * @param  PDO   $connexion [description]
 * @param  int   $postId    [description]
 * @return array            [description]
 */
function findAllByPostId(\PDO $connexion, int $postId) :array {
  $sql = "SELECT *
          FROM tags t
          JOIN posts_has_tags pht ON t.id = pht.tag_id
          WHERE pht.post_id = :postId
          ORDER BY t.name ASC;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':postId', $postId, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

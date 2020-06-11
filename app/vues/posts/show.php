<?php
/*
  ./app/vues/posts/show.php
  Variables disponibles :
    - $post: ARRAY(id, title, created_at, resume, image, content, author_id, categorie_id)
    - $author: ARRAY(id, firstname, lastname, biography, image)
 */
 ?>
 <p class="mb-5">
   <img src="images/<?php echo $post['image']; ?>" alt="" class="img-fluid">
 </p>

 <h1 class="mb-3 h1"><?php echo $post['title']; ?></h1>

 <div class="">
   <?php echo $post['content']; ?>
 </div>

  <!-- TAGS LIST -->
    <?php
      include_once '../app/controleurs/tagsControleur.php';
      \App\Controleurs\TagsControleur\indexByPostIdAction($connexion, $post['id']);
     ?>

  <!-- AUTHOR DETAILS -->
    <?php include '../app/vues/authors/show.php'; ?>

  <!-- COMMENTS LIST -->
    <?php
      include_once '../app/controleurs/commentsControleur.php';
      \App\Controleurs\CommentsControleur\indexByPostIdAction($connexion, $post['id']);
     ?>

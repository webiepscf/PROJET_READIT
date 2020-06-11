<?php
/*
  ./app/vues/categories/index.php
  Variables disponibles :
    - $categories: ARRAY(ARRAY(id, name))
 */
 ?>
 <div class="categories">
   <h3>Categories</h3>

   <?php foreach ($categories as $category): ?>
     <li><a href="#"><?php echo $category['name']; ?> <span class="ion-ios-arrow-forward"></span></a></li>
   <?php endforeach; ?>

 </div>

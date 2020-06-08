<?php
/*
  ./app/vues/template/partials/_main.php
 */
 ?>
 <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <?php echo $content; ?>
        </div>

        <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
          <?php include '../app/vues/template/partials/_aside.php'; ?>
        </div>

      </div>
    </div>
  </section> <!-- .section -->

<?php
// include 'demo.php';
// require 'connexion.php';
include 'header-front.php';

$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur order by id_art DESC');
$excuteIsOk = $stmt->execute();
$articles = $stmt->fetchAll();


?>



<!-- ******************************************************************Root -->

<div class="hero-wrap js-fullheight " style="background-image: url('img/image_3.jpeg');height: 500px;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" style="margin-top:70px;padding-top:80px" data-scrollax-parent="true">
      <div class="col-md-12 ftco-animate">
        <h2 class="subheading mx-5">Hello! Welcome to</h2>
        <h1 class="mb-4 mb-md-0 mx-5">World blog</h1>
        <div class="row">
          <div class="col-md-7">
            <div class="text my-3 p-5">
              <p>Far far away, behind the word mountains, far from the countries Vokalia
                and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row d-flex">

      <!-- foreach -->

      <?php foreach ($articles as $article) : ?>


        <div class="col-md-4 d-flex ftco-animate mb-5 p-2 ">
          <div class="blog-entry justify-content-end over  shadow-sm test">

            <div href="blog-single.html" class="block-20 border" style="background-image: url('img/article/<?= $article['image_art'] ?>');">
            </div>

            <div class="text p-4 float-right d-block bg-white">
              <div class="topper d-flex align-items-center">
                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                  <?php
                    $date = date_create($article['date']);
                    $day = date_format($date, 'd');
                    $year = date_format($date, 'Y');
                    $month = date_format($date, 'M');

                    ?>
                  <span class="day"><?= $day ?></span>
                </div>
                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                  <span class="yr"><?= $year ?></span>
                  <span class="mos"> <?= $month ?></span>
                </div>
              </div>

              <div style="height:200px;" class="bloc d-flex flex-column justify-content-between  ">
                <div class="row justify-content-between m-0">
                  <div class="text-muted">
                    <i class="fa fa-user mr-1" aria-hidden="true"></i>
                    <span class="mr-4"><?= $article['nom_aut']; ?></span>
                  </div>
                  <div>

                    <i class="fa fa-folder mr-1" aria-hidden="true"></i>
                    <span><?= $article['nom']; ?></span>
                  </div>

                </div>
                <!-- <div class="text-center "><span><a href="#" class=""><?= substr($article['nom'], 0, 50); ?></a></span></div> -->
                <div class="row">

                </div>
                <h3 class="heading mb-3"><a href="#"><?= substr($article['title'], 0, 50); ?></a></h3>
                <p><?= substr($article['contenu'], 0, 40) . "..."; ?></p>

                <div class="mt-4 mx-auto">
                  <a href="single-art-front.php?id-article=<?= $article['id_art'] ?>&category=<?= $article['nom'] ?>" class="btn-custom aaa text-white" id="aaa">Read more</a>
                </div>

              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>




    </div>
    <!-- pagination -->
    <!-- <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div> -->
  </div>
</section>
<?php include 'footer-front.php'; ?>



<!-- // echo $article['date'];
// $date1 = DateTime::createFromFormat('!Y-m-d h:i:s', $article['date']); -->

<!-- endforeach -->
<!-- <div class="col-md-4 d-flex ftco-animate">
  <div class="blog-entry justify-content-end">
    <a href="blog-single.html" class="block-20" style="background-image: url('img/image_2.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_3.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_4.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_5.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_6.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_7.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_8.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/image_9.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">18</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">2019</span>
              			<span class="mos">October</span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div> -->
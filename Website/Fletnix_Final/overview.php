<?php
  session_start();
  if(!isset($_SESSION['login_token'])){
    header('Location: login_page.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fletnix</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/styles.css"/>

  <?php require 'components/connect.php'; ?>
  <?php require 'components/get_movie_information.php';   $dirname = 'images/posters/'; ?>
</head>

<body>
  <?php require_once 'components/header.php'; ?>

  <main>
    <div class="highlight-wrapper">
      <a>
        <!-- Get a random highlight image from the popular movies/series -->
        <img src=
          <?php $x = get_movie_data("select ", 'img_name', " from movie M join movie_genre MG on M.movie_id = MG.movie_id where MG.genre = 'popular'");
                $r = mt_rand(1,count($x));
                echo $x[$r-1]?>
          alt="highlight image" />
      </a>
    </div>

    <!-- Creating all the categorie lists -->

    <div class="slider-container" id="content-1">
      <h3>Popular on Fletnix</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'popular'");
          shuffle($arr);

          foreach ($arr as &$value) {
            $img_url = ($dirname . $value . '.jpg');
            $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-2">
      <h3>Trending</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'trending'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
            $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-3">
      <h3>Action</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'action'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
              $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-6">
      <h3>Adventure</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'adventure'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
              $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-8">
      <h3>Animation</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'animation'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
              $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-4">
      <h3>Fantasy</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'fantasy'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
              $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-5">
      <h3>Sci-fi</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'sci-fi'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
              $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>

    <div class="slider-container" id="content-7">
      <h3>Thriller</h3>
      <div class="slider-items scrollbar-style">
        <?php
          $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = 'thriller'");
          shuffle($arr);

          foreach ($arr as &$value) {
              $img_url = ($dirname . $value . '.jpg');
              $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

            echo "<a href='watch.php?movie=$value'><img src=$img_url alt='$img_name' /><div class='info-content'>$img_name</div></a>";
          }
        ?>
      </div>
    </div>
  </main>

  <?php require_once 'components/footer.php' ?>
</body>
</html>

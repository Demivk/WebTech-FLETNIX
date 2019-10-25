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
    <?php require 'components/get_movie_information.php'; ?>
</head>

<body>
  <?php require_once 'components/header.php';?>

<main>
    <div class="information-container">
        <div class="movie-block">
            <h2><?=$movie_title[0]?></h2>
              <a href=<?=$movie_movie[0]?> target="_blank"><div class="movie-image" style="background-image:url(<?=$movie_image?>);">
              </div></a>
                <!-- <img src="http://www.placehold.it/1280x700" alt=""/> -->
        </div>

        <div class="movie-information">
            <strong>Year: </strong><span><?=$movie_year[0]?></span><br />
            <strong>Genre(s): </strong><span><?php $x = ""; foreach($movie_genre as &$value){$x .= $value.", ";} echo substr($x,0,-2);?></span><br />
            <strong>Duration: </strong><span><?=$movie_duration[0] . " Minutes"?></span><br />
            <strong>Director(s): </strong><span><?php $x = ""; foreach($movie_directors as &$value){$x .= $value.", ";} echo substr($x,0,-2);?></span><br />
            <strong>Cast: </strong>
            <span class="movie-information-cast scrollbar-style"><?php $x = ""; foreach($movie_cast as &$value){$x .= $value.", ";} echo substr($x,0,-2);?></span><br />
            <strong>Description: </strong>
            <span class="movie-information-text scrollbar-style"><?=$movie_description[0]?></span> <br />
        </div>
    </div>

    <div class="relatable">
        <div class="slider-container">
            <h3>Related</h3>
            <div class="slider-items scrollbar-style">
                <?php
                  $randomGenre = $movie_genre[mt_rand(0,count($movie_genre)-1)];

                  $arr = get_movie_data("select ", 'movie_id', " from movie_genre where genre = '$randomGenre'");
                  shuffle($arr);

                  foreach ($arr as &$value) {
                    if($value != $movie_id){
//                      $img_url = get_movie_data("select ", 'img_name', " from movie where movie_id = $value")[0];
//                      $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

                        $img_url = ($dirname . $value. '.jpg');
                        $img_name = get_movie_data("select ", 'title', " from movie where movie_id = $value")[0];

                      echo "<a href='watch.php?movie=$value'><img src=$img_url /><div class='info-content'>$img_name</div></a>";
                    }
                  }
                ?>
            </div>
        </div>
    </div>
</main>

<?php require_once 'components/footer.php' ?>
</body>
</html>

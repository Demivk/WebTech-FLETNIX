<?php
  require 'components/get_movie_information.php';

  $dirname = 'images/posters/';
  $search_result = $_POST['search'];
  $search_result_arr = explode("; ", $search_result);
  $result = array();

  for($n = 0; $n < count($search_result_arr); $n++) {
    // searching on title
    $temp1 = array();
    $temp1 = get_movie_data("select ", 'movie_id', " from movie where title like '%$search_result_arr[$n]%'");
    addToResult($temp1);

    // searching on year
    $temp2 = array();
    $temp2 = get_movie_data("select ", 'movie_id', " from movie where year like '%$search_result_arr[$n]%'");
    addToResult($temp2);

    // searching on genre
    $temp3 = array();
    $temp3 = get_movie_data("select ", 'movie_id', " from movie_genre where genre like '%$search_result_arr[$n]%'");
    addToResult($temp3);

    // seraching on director name
    $temp4 = array();
    $temp4 = get_movie_data("select ", 'person_id', " from person where name like '%$search_result_arr[$n]%'");
    $temp6 = array();
    for($i = 0; $i < count($temp4); $i++) {
      $temp5 = $temp4[$i];
      $temp6 = get_movie_data("select ", 'movie_id', " from movie_directors where person_id = '$temp5'");
      addToResult($temp6);
    }
  }

  // only selecting movie once
  $result = array_unique($result);

  // looping over evey element and displaying it
  for ($i = 0; $i < count($result); $i++) {
    if($result[$i] >= 1){
      $temp7 = $result[$i];
      $finalTitle = get_movie_data("select ", 'title', " from movie where movie_id = '$temp7'");
      $finalImg = ($dirname . $temp7 . '.jpg');;
      echo "<div class='search_result_box_result'>
              <img src='$finalImg' alt='$finalTitle[0]'/>
              <a href='watch.php?movie=$temp7' alt='$finalTitle[0]'>
                <div class='search_result_box_info'>
                  <div class='text'>
                    $finalTitle[0]
                  </div>
                </div>
              </a>
            </div>";
    }
  }

  // small function to add query result to results array
  function addToResult($n) {
    global $result;
    for ($i = 0; $i < count($n); $i++) {
      array_push($result, $n[$i]);
    }
  }
?>

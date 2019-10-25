<?php
  $items1 = array('fletnix'=>'index.php', 'browse'=>'overview.php', 'subscription'=>'subscription.php', 'user'=>'login_page.php');
  $items2 = array('Homepage', 'Popular', 'Trending', 'Action', 'Fantasy', 'Sci-fi');

  // checking if user has logged in
  $hasLoggin = false;
  if(isset($_SESSION['login_token'])){
    $hasLoggin = true;
  }

  // checking if user is on movie page
  $canSearch = false;
  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  if (strpos($url,'overview') !== false || strpos($url, 'watch') !== false || strpos($url, 'search_page') !== false) {
    $canSearch = true;
  }
?>

<header>
  <div class="horizontal-nav-bar">
    <nav class="nav-left">
      <ul>
        <li class="logo">
          <a href=<?=$items1['fletnix']?>><h1>Fletnix</h1></a>
        </li>
        <li class="dropdown">
          <a href=<?=$items1['browse']?> class="dropdown-button">Browse &#9662;</a>
          <div class="dropdown-content">
            <a class="dropdown-homepage" href=<?=$items1['fletnix']?>>Homepage</a>
            <?php // looping over dropdown menu list
              for ($i = 0; $i < count($items2); $i++) {
              if ($i >= 1) {
                $str1 = "$items1[browse]#content-$i";
                echo "<a href=$str1>$items2[$i]</a>";
              }
            } ?>
          </div>
        </li>
      </ul>
    </nav>

    <nav class="nav-right">
      <ul>
        <li>
          <a href=<?=$items1['subscription']?>>Subscription</a>
        </li>
        <li>
          <a href=<?php if($hasLoggin){echo "components/logout.php";}else{echo $items1['user'];}?>><?php if($hasLoggin){ echo $_SESSION['login_token']."(logout)";}else{echo "login";}?></a>
        </li>
      </ul>
    </nav>

    <?php if($canSearch) {
      echo "
      <div class='search-box-box' >
        <span>
          <form method='post' action='search_page.php'>
            <input type='text' name='search' placeholder='Search like: Action; Matrix' />
            <input type='submit' value='&#x1F50D;' />
          </form>
        </span>
      </div>
      ";
     } ?>

    <div class="user-info-box-content">
      <span>
        <?php
          // if logged in, show logged in since
          if($hasLoggin) {
            echo date("l d M") . ", ingelogd sinds " . $_SESSION['log_in_time'];
          }
        ?>
      </span>
    </div>
  </div>
</header>

<?php
  $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $dbh;
  global $connection;

  //check if the site is on the web server
  $onServer = false;
  if (strpos($url, 'melon') !== false) {
    $onServer = true;
  }

  if(!$onServer) {
    // open connection to xammp or microsoft database
    // $dbh = OpenConnectionToXampp();
    $dbh = OpenConnectionToMicrosoft();
    $connection = 2;
  } else {
    // open different connection to database if the site is running on the web server
    $dbh = OpenConnectionToMelon();
    $connection = 1;
  }

  function OpenConnectionToXampp() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "wt_fletnix";

    $dbh = new PDO ("mysql:Host=$dbhost;dbname=$dbname;ConnectionPooling=0","$dbuser","$dbpass");
    return $dbh;
  }

  function OpenConnectionToMicrosoft() {
    $hostname = "localhost";
    $dbname   = "WT_FLETNIX";
    $username = "sa";
    $pw       = "durfk45139";

    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0","$username","$pw");
    return $dbh;
  }

  function OpenConnectionToMelon() {
    $dbhost   = "localhost";
    $dbuser   = "mythic1q_jannick";
    $dbpass   = "memelord";
    $dbname   = "mythic1q_wt_fletnix";

    $dbh = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n". $dbh -> error);
    return $dbh;
  }

  function CloseConn(){
    $dbh->close();
  }
?>

<?
  //connect to db
  $db = mysqli_connect("localhost", "nbussmansql8", "ajGiecCj3bv6anK1", "nbussmansql8");
  if(!$db)
  {
    exit("Verbindungsfehler: ");//.mysqli_connect_error());
  }
  if (!$db->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $db->error);
    exit();
  } else {
      //printf("Current character set: %s\n", $db->character_set_name());
  }
?>

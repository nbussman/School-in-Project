<?
  include("mysql_connect.php");

  $w1 =  $_POST["w1"];
  $w2 =  $_POST["w2"];
  $w3 =  $_POST["w3"];
  $userid =  $_POST["userid"];
  $pid =  $_POST["pid"];
  if(is_numeric($pid) && is_numeric($userid) && is_numeric($w1) && is_numeric($w1) && is_numeric($w1)){
    $query = sprintf("UPDATE teilnehmer SET `wahl1`='%s' , `wahl2`='%s' , `wahl3`='%s' WHERE pid='%s' AND id='%s'",
              mysqli_real_escape_string($db, ($w1),
              mysqli_real_escape_string($db, ($w2),
              mysqli_real_escape_string($db, ($w3),
              mysqli_real_escape_string($db, ($pid),
              mysqli_real_escape_string($db, (strtoupper($userid)));
    $eintragen = mysqli_query($db, $query);
    if($eintragen ){
        include("header.php");
      ?>
      <br><br>
      <div class="jumbotron">
        <h1>Vielen Dank!</h1>
        <p>Deine Wahl wurde gespeichert. Die Lehrkraft wird Ihnen das zugewiesene Projekt mitteilen. </p>
      </div>
      <?
        include("footer.php");
    }
  }

?>

<?
  include("mysql_connect.php");
  $username = mysqli_real_escape_string($db, ($_GET["username"]);
  $pid = $_GET["pid"];

  // check if the username belongs to the project
  if (!is_numeric($pid) || $pid <=0)  exit();

  $query = sprintf("SELECT id, pid, UPPER(name) FROM teilnehmer WHERE pid='%s' AND name='%s' AND aktiv='1'",
            mysqli_real_escape_string($db, ($pid),
            mysqli_real_escape_string($db, (strtoupper($username)));
  $ergebnis = mysqli_query($db, $query);
  if( mysqli_num_rows($ergebnis) <=0){
    include("login.php");
    exit();
  }
  $userid = -1;
  while($row = mysqli_fetch_object($ergebnis))
  {
    $userid = $row->id;
  }


  include("header.php");
?>
      <div class="smallbox">
        <img src="img/logo300.png">
        <h4>Hallo <strong><?=$username ?></strong>,<br> wählen Sie nun die Projekte. </h4>
        <form id="wahl" action="savewahl.php/" method="post">

          <div class="box">
          <h3>1. Wahl</h3>
          <?
            $query = sprintf("SELECT * FROM `projekte` WHERE pid ='%s'",
                      mysqli_real_escape_string($db, ($pid));
            $ergebnis = mysqli_query($db, $query);
            while($row = mysqli_fetch_object($ergebnis))
            {
              ?>
                <div class="radio">
                  <label><input type="radio" name="w1" value="<?=$row->id ?>" required><?=$row->name ?> <i><small><?=$row->beschreibung ?></small></i></label>
                </div>
              <?
            }
          ?>
        </div>
          <div class="box">
            <h3>2. Wahl</h3>

              <?
                $query = sprintf("SELECT * FROM `projekte` WHERE pid ='%s'",
                          mysqli_real_escape_string($db, ($pid));
                $ergebnis = mysqli_query($db, $query);
                while($row = mysqli_fetch_object($ergebnis))
                {
                  ?>
                    <div class="radio">
                      <label><input type="radio" name="w2" value="<?=$row->id ?>" required><?=$row->name ?> <i><small><?=$row->beschreibung ?></small></i></label>
                    </div>
                  <?
                }
              ?>
            </div>
            <div class="box">
            <h3>3. Wahl</h3>
          <?
            $query = sprintf("SELECT * FROM `projekte` WHERE pid ='%s'",
                      mysqli_real_escape_string($db, ($pid));
            $ergebnis = mysqli_query($db, $query);
            while($row = mysqli_fetch_object($ergebnis))
            {
              ?>
                <div class="radio">
                  <label><input type="radio" name="w3" value="<?=$row->id ?>" required><?=$row->name ?> <i><small><?=$row->beschreibung ?></small></i></label>
                </div>
              <?
            }
          ?>
        </div>

        <input type="hidden" name="userid" value="<?=$userid ?>">
        <input type="hidden" name="pid" value="<?=$pid ?>">
        <button type="submit" id="votebtn" class="btn btn-default btn-lg">Wahl absenden</button>
      </form>
<?
  include("footer.php");
?>

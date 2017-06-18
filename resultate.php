<?
  include("mysql_connect.php");
  include("header.php");

  function w1zugeordnetSchuelerAnz($db,$id){
    $query = sprintf("SELECT count(id) as anzahl FROM teilnehmer WHERE wahl1='%s'",
            mysqli_real_escape_string($db, ($id));
    $ergebnis = mysqli_query($db,$query);
    while($row = mysqli_fetch_object($ergebnis))
    {
      return $row->anzahl;
    }
  }

  function maxAnzahl($db, $pid){
    $query = sprintf("SELECT maxanzahl FROM `projekte` WHERE pid='%s'",
      mysqk_real_escape_string($pid));
    $ergebnis = mysqli_query($db, $query);
    while($row = mysqli_fetch_object($ergebnis))
    {
      return $row->maxanzahl;
    }
  }


  $pid=$_GET["pid"];

  //user auf inaktiv setzen
  if(is_numeric($pid)){

    $query = sprintf("UPDATE teilnehmer SET `aktiv`='0' WHERE pid='%s'",
              mysqli_real_escape_string($db, ($pid));
    $eintragen = mysqli_query($db, $query);
    if($eintragen){
      //alle user sind inaktiv
      // #Zuweisung durchführen
      //1. wahl für alle projekt geben wenn möglich
      $query = sprintf("SELECT * FROM projekte WHERE pid='%s'",
                mysqli_real_escape_string($db, ($pid));
      $ergebnis = mysqli_query($db, $query);
      while($row = mysqli_fetch_object($ergebnis))
      {
        //echo $row->name." (".$row->maxAnzahl.")<br>";
        $queryInner = sprintf("UPDATE teilnehmer SET `projektZugewiesen`='%s' WHERE wahl1='%s' AND projektZugewiesen =0 ORDER BY RAND() LIMIT %s",
          mysqli_real_escape_string($db, ($row->id),
          mysqli_real_escape_string($db, ($row->id),
          mysqli_real_escape_string($db, ($row->maxAnzahl));
        $ergebnisInner = mysqli_query($db, $queryInner);
      }

      //2. wahl für alle projekt geben wenn möglich
      $query = sprintf("SELECT * FROM projekte WHERE pid='%s'",
                mysqli_real_escape_string($db, ($pid));
      $ergebnis = mysqli_query($db, $query);
      while($row = mysqli_fetch_object($ergebnis))
      {
        //echo $row->name." (".$row->maxAnzahl.")<br>";
        $queryInner = sprintf("UPDATE teilnehmer SET `projektZugewiesen`='%s' WHERE wahl2='%s' AND projektZugewiesen =0 ORDER BY RAND() LIMIT %s",
          mysqli_real_escape_string($db, ($row->id),
          mysqli_real_escape_string($db, ($row->id),
          mysqli_real_escape_string($db, ($row->maxAnzahl));
        $ergebnisInner = mysqli_query($db, $queryInner);
      }
      //3. wahl für alle projekt geben wenn möglich
      $query = sprintf("SELECT * FROM projekte WHERE pid='%s'",
                mysqli_real_escape_string($db, ($pid));
      $ergebnis = mysqli_query($db, $query);
      while($row = mysqli_fetch_object($ergebnis))
      {
        //echo $row->name." (".$row->maxAnzahl.")<br>";
        $queryInner = sprintf("UPDATE teilnehmer SET `projektZugewiesen`='%s' WHERE wahl3='%s' AND projektZugewiesen =0 ORDER BY RAND() LIMIT %s",
          mysqli_real_escape_string($db, ($row->id),
          mysqli_real_escape_string($db, ($row->id),
          mysqli_real_escape_string($db, ($row->maxAnzahl));
        $ergebnisInner = mysqli_query($db, $queryInner);
      }

      ?>
      <br>
      <div class="jumbotron noprint">
        <h1>Zuweisung erfolgreich</h1>
        <p>Die Zuweisung war erfolgreich. Bitte drucken Sie diese Liste für die Bekanntgabe der Zuordnung aus.</p>
        <button type="button" class="btn btn-default btn-lg" onClick="window.print();return false">Liste drucken</button>
      </div>
      <?

      //Welche SuS konnten nicht zugeordnet werden?
      $query = "SELECT * FROM `teilnehmer` WHERE wahl1>0 AND wahl2>0 AND wahl3>0 AND projektZugewiesen<=0";
      $ergebnis = mysqli_query($db,$query);
      ?> <ul> <?
      while($row = mysqli_fetch_object($ergebnis))
      {
        ?> <li><h4> <?=$row->name ?>konnte nicht zugewiesen werden. </h4></li><?
      }
      ?> </ul> <?
      ?> <h1> Projektzuweisung</h1>
      <table id="zugeordnetTabelle" border=1 >
        <tr>
          <td><strong>Name</strong></td>
          <td><strong>Zugeordnetes Projekt</strong></td>
          <td><strong>1. Wahl</strong></td>
          <td><strong>2. Wahl</strong></td>
          <td><strong>3. Wahl</strong></td>
        </tr>
      <?
        $query = sprintf("SELECT t.name, p.name as projektZugewiesen, p1.name as wahl1, p2.name as wahl2, p3.name as wahl3
              FROM teilnehmer t, projekte p, projekte p1,projekte p2,projekte p3
              WHERE t.pid='%s'
              AND projektZugewiesen>0
              AND projektZugewiesen = p.id
              AND wahl1 = p1.id
              AND wahl2 = p2.id
              AND wahl3 = p3.id",
            mysqli_real_escape_string($db, ($pid));
        $ergebnis = mysqli_query($db,$query);
        while($row = mysqli_fetch_object($ergebnis))
        {
          ?>
            <tr>
              <td><?=$row->name ?></td>
              <td><?=$row->projektZugewiesen ?></td>
              <td><?=$row->wahl1 ?></td>
              <td><?=$row->wahl2 ?></td>
              <td><?=$row->wahl3 ?></td>
            </tr>
          <?
        }
      ?>
      </table>
      <?
      //Zuweisung anzeigen
    }
  }
  include("footer.php");
?>

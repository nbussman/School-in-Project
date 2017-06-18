<?
  include("header.php");
?>
      <div class="smallbox">
        <img src="img/logo300.png">
        <h2>Auswahlbogen erstellen</h3>
        <form action="printNameList.php" method="post" accept-charset="UTF-8">
          <div class="form-group">
            <label for="input1">Name</label>
            <input required name="name" type="text" class="form-control" id="input1" placeholder="Namen des Auswahlbogen ...">
  				</div>
  				<div class="form-group">
            <label for="input2">Anzahl der Teilnehmer/innen</label>
  					<input required type="number" max="1300" class="form-control" id="input2" name="teilnehmeranzahl">
          </div>
          <h4>Projekte hinzufügen</h3>
          <div id="projectAddWrapper">
            <div class="projectAdd">
              <label for="pName1">Projektname</label>
              <input required name="pName1" type="text" class="form-control" id="inputName" placeholder="Namen des Projekts ...">
              <label for="pbeschreibung1">Projektbeschreibung</label>
              <input required name="pbeschreibung1" type="text" class="form-control" id="inputBeschreibung" maxlength="60" placeholder="Kurzbeschreibung des Projekts ...">
              <label for="panzahl1">Maximale Teilnehmeranzahl</label>
    					<input required name="panzahl1" type="number" class="form-control" id="input2" >
            </div>
          </div>

          <div id="projectAddWrapper">
            <div class="projectAdd">
              <label for="pName2">Projektname</label>
              <input required name="pName2" type="text" class="form-control" id="inputName" placeholder="Namen des Projekts ...">
              <label for="pbeschreibung2">Projektbeschreibung</label>
              <input required name="pbeschreibung2" type="text" class="form-control" id="inputBeschreibung" maxlength="60" placeholder="Kurzbeschreibung des Projekts ...">
              <label for="panzahl1">Maximale Teilnehmeranzahl</label>
    					<input required name="panzahl2" type="number" class="form-control" id="input2" >
            </div>
          </div>
          <div id="projectAddWrapper">
            <div class="projectAdd">
              <label for="pName3">Projektname</label>
              <input required name="pName3" type="text" class="form-control" id="inputName" placeholder="Namen des Projekts ...">
              <label for="pbeschreibung3">Projektbeschreibung</label>
              <input required name="pbeschreibung3" type="text" class="form-control" id="inputBeschreibung" maxlength="60" placeholder="Kurzbeschreibung des Projekts ...">
              <label for="panzahl3">Maximale Teilnehmeranzahl</label>
    					<input required name="panzahl3" type="number" class="form-control" id="input2" >
            </div>
          </div>
          <center>
            <button type="button" id="addProject" class="btn btn-default">Projekt hinzufügen</button>
          </center>
        <button type="submit" id="votebtn" class="btn btn-default btn-lg">Erstellen</button>
      </form>
<?
  include("footer.php");
?>

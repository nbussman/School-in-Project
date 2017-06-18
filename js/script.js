var projektAnzahl = 3;
$("#addProject").on("click", function(){
  projektAnzahl++;
  $("#projectAddWrapper").append(
  '<div class="projectAdd">'+
  '  <label for="pName'+projektAnzahl+'">Projektname</label>'+
  '  <input name="pName'+projektAnzahl+'" type="text" class="form-control" id="inputName" placeholder="Namen des Projekts ...">'+
  '  <label for="pbeschreibung'+projektAnzahl+'">Projektname</label>'+
  '  <input name="pbeschreibung'+projektAnzahl+'" type="text" class="form-control" id="inputBeschreibung" maxlength="60" placeholder="Kurzbeschreibung des Projekts ...">'+
  '  <label for="panzahl'+projektAnzahl+'">Maximale Teilnehmeranzahl</label>'+
  '  <input name="panzahl'+projektAnzahl+'" type="int" class="form-control" id="input2" name="teilnehmeranzahl">'+
  '</div>');
});


$('#wahl input').on('change', function() {
  currentVal = $(this).val();
  selector = "#wahl input[value='"+currentVal+"']:checked";
  $(selector).prop('checked', false);
  $(this).prop('checked', true);
});

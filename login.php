<?
  include("header.php");
?>
      <form class="form-signin" action="wahl.php" method="get">
        <input type="hidden" name="pid" value="<?=$_GET["pid"] ?>">
        <img src="img/logo300.png">
        <h2 class="form-signin-heading">Melde dich an:</h2>
        <label for="inputName" class="sr-only">Phantasiename</label>
        <input type="text" name="username" id="inputName" class="form-control" placeholder="Phantasiename" required autofocus>
      <br>
        <button class="btn btn-lg btn-default btn-block" type="submit">Anmelden</button>
      </form>

<?
  include("footer.php");
?>

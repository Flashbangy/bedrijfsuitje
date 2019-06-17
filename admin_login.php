<main>
    <div class="container">
        <div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form name="login" onsubmit="return validateForm()" method="POST" action="">
                        gebruikersnaam
                        <br>
                        <input type="text" name="gebruikersnaam">
                        <br> wachtwoord
                        <br>
                        <input type="text" name="wachtwoord">
                        <input type="submit" value="Submit" name="submit" />
                    </form>

                </div>
            </div>
        </div>
</main>
<?php

if(isset($_POST['submit'])){
  if(isset($_POST['gebruikersnaam']) && !empty($_POST['gebruikersnaam']) &&
  isset($_POST['wachtwoord']) && !empty($_POST['wachtwoord'])
  )
  {
    var_dump($_POST);
    /* Execute a prepared statement by passing an array of values */
    $sth = $conn->prepare('SELECT * FROM users 
                            WHERE gebruikersnaam = :gebruikersnaam');                     
    $sth->execute(array(':gebruikersnaam' => $_POST['gebruikersnaam']));
    $res = $sth->fetchAll();
    //var_dump($res[0]['wachtwoord']);
    if (password_verify($_POST['wachtwoord'], $res[0]['wachtwoord'])) {
      $_SESSION['id'] = $res[0]['id'];
      $_SESSION['gebruikersnaam'] = $res[0]['gebruikersnaam'];
      header('Location: index.php?page=admin');
      exit();
    } else {
      echo 'Invalid password.';
    }
  }

}
?>
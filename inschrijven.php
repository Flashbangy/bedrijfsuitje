
<?php
    include_once 'dbconfig.php';

$sth = $conn->prepare("SELECT * FROM activiteiten WHERE id = :id");
$sth->bindParam(":id", $_GET['id']);
$sth->execute();
$res = $sth->fetchAll();
if ($sth->rowCount() == 1) {
  if(intval($_SESSION['id']) > 0){

    //insert in database
          $sth = $conn->prepare("INSERT INTO inschrijvingen (
          id, user_id, activiteiten_id) 
          VALUES (:id, :users_id, :activiteiten_id)");
          $sth->bindParam(":id", $_GET['id']);
          $sth->bindParam(":user_id", $_SESSION['id']);
          $sth->bindParam(":activiteiten_id", $res[0]['activiteiten_id']);
          // use exec() because no results are returned

          $sth->execute();
          header("Location: activiteiten.php?id=1");
  }
} else {
  echo 'Deze activiteit bestaat niet';
}

?>
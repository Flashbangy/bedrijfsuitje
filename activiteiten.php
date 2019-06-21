<main>
    <div class="container">

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
                    <?php
$sth = $conn->prepare('SELECT * FROM activiteiten'); 
$sth->execute();                    
$result = $sth->fetchAll();

?>

                        <div class="container">
                        <!-- Table met alle info -->
                            <table>
                                <tr>
                                    <td>A-ID</td>
                                    <td>Naam</td>
                                    <td>Omschrijving</td>
                                    <td>Locatie</td>
                                    <td>Inschrijvingen</td>
                                    <td>Tijdstip aanvang</td>
                                    <td>Tijdstip einde</td>
                                    <td>Deadline</td>
                                    <td>Acties</td>
                                </tr>
                                <?php
                                 foreach($result as $r){
                                  ?>
                                    <tr>
                                        <td>
                                            <?php echo $r['id'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['naam'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['omschrijving'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['locatie'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['maximaal_aantal_inschrijvingen'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['tijdstip_aanvang'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['tijdstip_einde'];?>
                                        </td>
                                        <td>
                                            <?php echo $r['deadline_inschrijving'];?>
                                        </td>
                                        <td>
                                            <a href="index.php?page=inschrijven&action=inschrijven&id=<?php echo $r['id'];?>">Inschrijven</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>
    </div>
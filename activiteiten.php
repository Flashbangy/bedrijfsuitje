<main>
    <div class="container">
            <?php
            //UPDATE CODE
if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $sth = $conn->prepare('SELECT FROM activiteiten WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    $res = $sth->fetchAll();
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
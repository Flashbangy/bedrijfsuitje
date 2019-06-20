<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM personeel WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    header('Location: index.php?page=admin_personeel');
    exit();
}
?>

    <?php
if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $sth = $conn->prepare('SELECT FROM activiteiten WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    $res = $sth->fetchAll();
    //moet nog UPDATE
}
?>
        <?php
if(isset($_GET['action']) && $_GET['action'] == 'insert'){
    //moet nog INSERT
}
?>
            <?php
$sth = $conn->prepare('SELECT * FROM activiteiten'); 
$sth->execute();                    
$result = $sth->fetchAll();

?>
                <main>
                    <div class="container">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <br>
                                <a href="index.php?page=admin_users">Users</a>
                                <br>
                                <a href="index.php?page=admin_personeel">personeel</a>
                                <br>
                                <a href="index.php?page=admin_inschrijvingen">inschrijvingen</a>
                                <br>
                                <a href="index.php?page=admin_activiteiten">activiteiten</a>
                                <br>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">

                        <div class="panel-body">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label>Id</label>
                                        <input name="id" type="text" class="form-control" value="<?php if(isset($res)) {echo $res["id"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Naam activiteit</label>
                                        <input name="naam" type="text" class="form-control" value="<?php echo $res["naam"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>omschrijving</label>
                                        <input name="omschrijving" type="text" class="form-control" value="<?php echo $res["omschrijving"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Locatie</label>
                                        <input name="locatie" type="text" class="form-control" value="<?php if(isset($res)) {echo $res["locatie"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Max inschrijvingen</label>
                                        <input name="maximaal_aantal_inschrijvingen" type="text" class="form-control" value="<?php echo $res["maximaal_aantal_inschrijvingen"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tijdstip aanvang</label>
                                        <input name="tijdstip_aanvang" type="text" class="form-control" value="<?php echo $res["tijdstip_aanvang"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tijdstip einde</label>
                                        <input name="tijdstip_einde" type="text" class="form-control" value="<?php echo $res["tijdstip_einde"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Deadline</label>
                                        <input name="deadline_inschrijving" type="text" class="form-control" value="<?php echo $res["deadline_inschrijving"]?>">
                                    </div>
                                    <div class="form-group">
                                        <input name="userID" type="text" class="form-control hidden" value="<?php echo $res["users_id"]?>">    
                                        <button class="btn btn-primary" type="Submit">update</button>
                                     </div>
                             </div>
                    </div>
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
                                        <a href="index.php?page=admin_activiteiten&action=delete&id=<?php echo $r['id'];?>">delete</a> -
                                        <a href="index.php?page=admin_activiteiten&action=update&id=<?php echo $r['id'];?>">update</a>
                                    </td>
                                </tr>
                                <?php
								}
								?>
                        </table>
                    </div>
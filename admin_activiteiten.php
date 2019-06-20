<?php
//DELETE CODE
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM activiteiten WHERE id = :id');
    $sth->execute(array(':id' => $_GET['id']));
    header('Location: index.php?page=admin_activiteiten');
    exit();
}
?>

    <?php
    //UPDATE CODE
    if(isset($_POST['update'])){
        $conn->prepare('UPDATE `activiteiten` SET 
                        `naam`= ?,
                        `omschrijving`= ?,
                        `locatie`= ?,
                        `maximaal_aantal_inschrijvingen`= ?,
                        `tijdstip_aanvang`= ?,
                        `tijdstip_einde`= ?,
                        `deadline_inschrijving`= ?
                        WHERE id = ?')
              ->execute([ 
                        $_POST['naam'],
                        $_POST['omschrijving'],
                        $_POST['locatie'],
                        $_POST['maximaal_aantal_inschrijvingen'],
                        $_POST['tijdstip_aanvang'],
                        $_POST['tijdstip_einde'],
                        $_POST['deadline_inschrijving'],
                        intval($_GET['id'])
              ]);
    }
?>
        <?php
        //INSERT CODE
        if(isset($_POST['insert'])){
            $conn->prepare("INSERT INTO `activiteiten` (
                                `naam`,
                                `omschrijving`,
                                `locatie`,
                                `maximaal_aantal_inschrijvingen`,
                                `tijdstip_aanvang`,
                                `tijdstip_einde`,
                                `deadline_inschrijving`
                            ) 
                            VALUES (?,?,?,?,?,?,?)
                            ")
                  ->execute([ 
                           $_POST['naam'],
                           $_POST['omschrijving'],
                           $_POST['locatie'],
                           $_POST['maximaal_aantal_inschrijvingen'],
                           $_POST['tijdstip_aanvang'],
                           $_POST['tijdstip_einde'],
                           $_POST['deadline_inschrijving']
                  ]);
                  var_dump($_POST);
        }
?>
            <?php
$sth = $conn->prepare('SELECT * FROM activiteiten'); 
$sth->execute();                    
$result = $sth->fetchAll();

if(isset($_GET['id'])){
$sth = $conn->prepare('SELECT * FROM activiteiten where id = ' . intval($_GET['id']));
$sth->execute();
$res = $sth->fetchAll();
$res = $res[0];
}

?>
                <main>
                    <div class="container">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <br>
                                <a href="index.php?page=admin_users">Users</a>
                                <br>
                                <a href="index.php?page=admin_personeel">Personeel</a>
                                <br>
                                <a href="index.php?page=admin_inschrijvingen">Inschrijvingen</a>
                                <br>
                                <a href="index.php?page=admin_activiteiten">Activiteiten</a>
                                <br>
                            </div>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-body">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label>Naam activiteit</label>
                                        <input name="naam" type="text" class="form-control" value="<?php if(isset($res["naam"])) {echo $res["naam"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>omschrijving</label>
                                        <input name="omschrijving" type="text" class="form-control" value="<?php if(isset($res["omschrijving"])) {echo $res["omschrijving"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Locatie</label>
                                        <input name="locatie" type="text" class="form-control" value="<?php if(isset($res["locatie"])) {echo $res["locatie"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Max inschrijvingen</label>  
                                        <input name="maximaal_aantal_inschrijvingen" type="text" class="form-control" value="<?php if(isset($res["maximaal_aantal_inschrijvingen"])) {echo $res["maximaal_aantal_inschrijvingen"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tijdstip aanvang</label>
                                        <input name="tijdstip_aanvang" type="text" class="form-control" value="<?php if(isset($res["tijdstip_aanvang"])) {echo $res["tijdstip_aanvang"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tijdstip einde</label>
                                        <input name="tijdstip_einde" type="text" class="form-control" value="<?php if(isset($res["tijdstip_einde"])) {echo $res["tijdstip_einde"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Deadline</label>
                                        <input name="deadline_inschrijving" type="text" class="form-control" value="<?php if(isset($res["deadline_inschrijving"])) {echo $res["deadline_inschrijving"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <input name="id" type="text" class="form-control hidden" value="<?php if(isset($res["id"])) {echo $res["id"];}?>">    
                                     </div>
                                     <div class="form-group">
                                         <button name=update class="btn btn-primary" type="Submit">Update</button>
                                         <input name="insert" class="btn btn-primary" type="Submit" value="insert"/>
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
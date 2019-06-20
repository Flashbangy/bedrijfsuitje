<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM inschrijvingen WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    header('Location: index.php?page=admin_inschrijvingen');
    exit();
}
?>

    <?php
if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $sth = $conn->prepare('SELECT FROM inschrijvingen WHERE users_id = :users_id');
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
$sth = $conn->prepare('SELECT * FROM inschrijvingen'); 
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
                                        <label>Activiteit</label>
                                        <input name="activiteiten_id" type="text" class="form-control" value="<?php echo $res["activiteiten_id"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Personeelsnummer</label>
                                        <input name="users_id" type="text" class="form-control" value="<?php echo $res["users_id"]?>">
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
                                <td>Id</td>
                                <td>Activiteit</td>
                                <td>Personeels-nummer</td>
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
                                        <?php echo $r['activiteiten_id'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['users_id'];?>
                                    </td>
                                    <td>
                                        <a href="index.php?page=admin_inschrijvingen&action=delete&id=<?php echo $r['users_id'];?>">delete</a> -
                                        <a href="index.php?page=admin_inschrijvingen&action=update&id=<?php echo $r['users_id'];?>">update</a>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                        </table>
                    </div>
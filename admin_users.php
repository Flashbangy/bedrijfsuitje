<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM users WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    header('Location: index.php?page=admin_users');
    exit();
}
?>

    <?php
if(isset($_POST['update'])){
    $conn->prepare('UPDATE `users` SET 
                    `gebruikersnaam`= ?,
                    `wachtwoord`= ?,
                    `rol`= ?
                    WHERE id = ?')
          ->execute([ 
                    $_POST['gebruikersnaam'],
                    $_POST['wachtwoord'],
                    $_POST['rol'],
                    intval($_GET['id'])
          ]);
}
?>
        <?php
        //INSERT CODE
        if(isset($_POST['insert'])){
            $conn->prepare("INSERT INTO `users` (
                                `gebruikersnaam`,
                                `wachtwoord`,
                                `rol`
                            ) 
                            VALUES (?,?,?)
                            ")
                  ->execute([ 
                           $_POST['gebruikersnaam'],
                           $_POST['wachtwoord'],
                           $_POST['rol']
                  ]);
                  var_dump($_POST);
        }
?>
            <?php
$sth = $conn->prepare('SELECT * FROM users'); 
$sth->execute();                    
$result = $sth->fetchAll();

if(isset($_GET['id'])){
    $sth = $conn->prepare('SELECT * FROM users where id = ' . intval($_GET['id']));
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
                                        <label>Gebruikersnaam</label>
                                        <input name="gebruikersnaam" type="text" class="form-control hidden" value="<?php if(isset($res["gebruikersnaam"])) {echo $res["gebruikersnaam"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Wachtwoord</label>
                                        <input name="wachtwoord" type="text" class="form-control" value="<?php if(isset($res["wachtwoord"])) {echo $res["wachtwoord"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <input name="achternaam" type="text" class="form-control" value="<?php if(isset($res["rol"])) {echo $res["rol"];}?>">
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
                                <td>Id</td>
                                <td>Naam</td>
                                <td>Wachtwoord</td>
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
                                        <?php echo $r['gebruikersnaam'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['wachtwoord'];?>
                                    </td>
                                    <td>
                                        <a href="index.php?page=admin_users&action=delete&id=<?php echo $r['id'];?>">delete</a> -
                                        <a href="index.php?page=admin_users&action=update&id=<?php echo $r['id'];?>">update</a> 

                                    </td>
                                </tr>
                                <?php
                              }
                            ?>
                        </table>
                    </div>
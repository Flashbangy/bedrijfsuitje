<?php
//DELETE CODE
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM personeel WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    header('Location: index.php?page=admin_personeel');
    exit();
}
?>
    <?php
    //UPDATE CODE
if(isset($_POST['update'])){
    $conn->prepare('UPDATE `personeel` SET 
                    `voorletters`= ?,
                    `tussenvoegsel`= ?,
                    `achternaam`= ?,
                    `email`= ?,
                    `vouchercode`= ?
                    WHERE users_id = ?')
          ->execute([ 
                    $_POST['voorletters'],
                    $_POST['tussenvoegsel'],
                    $_POST['achternaam'],
                    $_POST['email'],
                    $_POST['vouchercode'],
                    intval($_GET['id'])
          ]);
}
?>
        <?php
        //INSERT CODE
if(isset($_POST['insert'])){
    $conn->prepare("insert into 
                    `personeel` (
                        `users_id`,
                        `voorletters`,
                        `tussenvoegsel`,
                        `achternaam`,
                        `email`,
                        `vouchercode`
                    ) 
                    VALUES (?,?,?,?,?,?)
                    ")
          ->execute([ 
                    rand(5, 15),
                    $_POST['voorletters'],
                    $_POST['tussenvoegsel'],
                    $_POST['achternaam'],
                    $_POST['email'],
                    $_POST['vouchercode']
          ]);
}
?>
            <?php
$sth = $conn->prepare('SELECT * FROM personeel');
$sth->execute();
$result = $sth->fetchAll();

if(isset($_GET['id'])){
$sth = $conn->prepare('SELECT * FROM personeel where users_id = ' . intval($_GET['id']));
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
                                        <label></label>
                                        <input name="users_id" type="text" class="form-control hidden" value="<?php if(isset($res["users_id"])) {echo $res["users_id"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Voorletters</label>
                                        <input name="voorletters" type="text" class="form-control" value="<?php if(isset($res["voorletters"])) {echo $res["voorletters"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tussenvoegsel</label>
                                        <input name="tussenvoegsel" type="text" class="form-control" value="<?php if(isset($res["tussenvoegsel"])) {echo $res["tussenvoegsel"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Achternaam</label>
                                        <input name="achternaam" type="text" class="form-control" value="<?php if(isset($res["achternaam"])) {echo $res["achternaam"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>E-Mail</label>
                                        <input name="email" type="text" class="form-control" value="<?php if(isset($res["email"])) {echo $res["email"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Vouchercode</label>
                                        <input name="vouchercode" type="text" class="form-control" value="<?php if(isset($res["vouchercode"])) {echo $res["vouchercode"];}?>">
                                    </div>
                                    <div class="form-group">
                                        <button name="update" class="btn btn-primary" type="Submit" >Update</button>
                                        <input name="insert" class="btn btn-primary" type="submit" value="insert"/>
                                    </div>
                             </div>
                        </div>
                        <!-- Table met alle info -->
                        <table>
                            <tr>
                                <td>Personeelsnummer</td>
                                <td>Voorletters</td>
                                <td>Tussenvoegsel</td>
                                <td>Achternaam</td>
                                <td>Email</td>
                                <td>Vouchercode</td>
                                <td>Acties</td>
                            </tr>
                            <?php
							foreach($result as $r){
							?>
                                <tr>
                                    <td>
                                        <?php echo $r['users_id'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['voorletters'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['tussenvoegsel'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['achternaam'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['email'];?>
                                    </td>
                                    <td>
                                        <?php echo $r['vouchercode'];?>
                                    </td>
                                    <td>
                                        <a href="index.php?page=admin_personeel&action=delete&id=<?php echo $r['users_id'];?>">delete</a> -
                                        <a href="index.php?page=admin_personeel&action=update&id=<?php echo $r['users_id'];?>">update</a>
                                    </td>
                                </tr>
                                <?php
								}
								?>
                        </table>
                    </div>
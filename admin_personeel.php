
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
    $sth = $conn->prepare('SELECT FROM personeel WHERE users_id = :users_id');
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
$sth = $conn->prepare('SELECT * FROM personeel');
$sth->execute();
$result = $sth->fetchAll();

?>
<main>
<div class="container">

<div class="panel panel-default">
        <div class="panel-body">
        <br>
            <a href="index.php?page=admin_users">Users</a><br>
            <a href="index.php?page=admin_personeel">personeel</a><br>
            <a href="index.php?page=admin_inschrijvingen">inschrijvingen</a><br>
            <a href="index.php?page=admin_activiteiten">activiteiten</a><br>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body">

            <form method="POST" action="">
                <div class="form-group">
                <label>Username</label>
                <input name="gebruikersnaam" type="text" class="form-control" value="Enter your username">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input name="wachtwoord" type="text" class="form-control" value="Enter your password">
                </div>
                <div class="form-group">
                <button type="save" class="btn btn-primary" type="Submit">Save</button>
                </div>


        </div>
    </div>





<table>
    <tr>
        <td>Voorletters</td>
        <td>Email</td>
        <td>Acties</td>
    </tr>
<?php
foreach($result as $r){
?>
<tr>
    <td><?php echo $r['voorletters'];?></td>
    <td><?php echo $r['email'];?></td>
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

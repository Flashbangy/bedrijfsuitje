<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM users WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    header('Location: index.php?page=admin_users');
    exit();
}
?>

<?php
if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $sth = $conn->prepare('SELECT FROM users WHERE users_id = :users_id');
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
$sth = $conn->prepare('SELECT * FROM users'); 
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
            <form method="post" action="">
                <div class="form-group">
                <label>Username</label>
                <input name="gebruikersnaam" type="text" value="Enter your username">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input name="wachtwoord" type="text" value="Enter your password">
                </div>
                <div class="form-group">
                <button type="save" type="Submit">Save</button>
                </div>

                
        </div>
    </div>



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
    <td><?php echo $r['id'];?></td>
    <td><?php echo $r['gebruikersnaam'];?></td>
    <td><?php echo $r['wachtwoord'];?></td>
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

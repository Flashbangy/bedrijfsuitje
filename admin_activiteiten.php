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
            <a href="index.php?page=admin_users">Users</a><br>
            <a href="index.php?page=admin_personeel">personeel</a><br>
            <a href="index.php?page=admin_inschrijvingen">inschrijvingen</a><br>
            <a href="index.php?page=admin_activiteiten">activiteiten</a><br>    
        </div>
    </div>



<table>
    <tr>
        <td>A-ID</td>
        <td>Naam</td>
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
    <td><?php echo $r['id'];?></td>
    <td><?php echo $r['naam'];?></td>
    <td><?php echo $r['maximaal_aantal_inschrijvingen'];?></td>
    <td><?php echo $r['tijdstip_aanvang'];?></td>
    <td><?php echo $r['tijdstip_einde'];?></td>
    <td><?php echo $r['deadline_inschrijving'];?></td>
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
</main>
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
<table>
    <tr>
        <td>voorletters</td>
        <td>email</td>
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

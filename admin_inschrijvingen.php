<?php
//DELETE CODE
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sth = $conn->prepare('DELETE FROM inschrijvingen WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    header('Location: index.php?page=admin_inschrijvingen');
    exit();
}
?>

    <?php
    //UPDATE CODE
if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $sth = $conn->prepare('SELECT FROM inschrijvingen WHERE users_id = :users_id');
    $sth->execute(array(':users_id' => $_GET['id']));
    $res = $sth->fetchAll();
}
?>
        <?php
        //INSERT CODE
if(isset($_GET['action']) && $_GET['action'] == 'insert'){
}
?>
            <?php
$sth = $conn->prepare('SELECT * FROM inschrijvingen'); 
$sth->execute();                    
$result = $sth->fetchAll();
?>
                <main>
                    <div class="container">
                        <!-- session check -->
                    <?php
                    if(isset($_SESSION) && $_SESSION['gebruikersnaam'] == 'admin'){
                    echo '<h2>welcome admin</h2>';
                    } else {
                    header('Location: index.php?page=admin_login');
                    }
?>
                    <div class="panel panel-default">
                        <!-- menu -->
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
                                        <a href="index.php?page=admin_inschrijvingen&action=delete&id=<?php echo $r['users_id'];?>">delete</a>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                        </table>
                    </div>
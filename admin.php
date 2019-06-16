<main>
<div class="container">
<?php
if(isset($_SESSION) && $_SESSION['gebruikersnaam'] == 'admin'){
    echo 'welcome admin';
} else {
    header('Location: index.php?page=admin_login');
}
?>


<div class="panel panel-default">
        <div class="panel-body">
        <br>
            <a href="index.php?page=admin_users">Users</a><br>
            <a href="index.php?page=admin_personeel">personeel</a><br>
            <a href="index.php?page=admin_inschrijvingen">inschrijvingen</a><br>
            <a href="index.php?page=admin_activiteiten">activiteiten</a><br>    
        </div>
    </div>
</div>
</main>
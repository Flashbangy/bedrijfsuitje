<main>
<div class="container">
    <!-- Dit checkt of je ingelogd bent en je krijgt welcome admin -->
<?php
if(isset($_SESSION) && $_SESSION['gebruikersnaam'] == 'admin'){
    echo '<h2>welcome admin</h2>';
} else {
    header('Location: index.php?page=admin_login');
}
?>

<!-- Dit is de menu van databases -->
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
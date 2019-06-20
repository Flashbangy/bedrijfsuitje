<div class="container">
<div class="panel panel-default">
    <div class="panel-body">
        <form method="POST" action="index.php?page=activiteiten">
            <div class="form-group">
                <label>Personeelsnummer</label>
                <input name="users_id" type="text" class="form-control" value="<?php if(isset($res["users_id"])) {echo $res["users_id"];}?>">
            </div>
            <div class="form-group">
                <label>Vouchercode</label>
                <input name="vouchercode" type="text" class="form-control" value="<?php if(isset($res["vouchercode"])) {echo $res["vouchercode"];}?>">
            </div>
            <div class="form-group">
                <button name="login" class="btn btn-primary" type="Submit">Inschrijven</button>
            </div>
        </div>
    </div>
</div>
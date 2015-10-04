<?php

?>

<div class="container">

    <div class="row">
        <div class="col-md-3"></div>
        <div id="hei" class="col-md-6" align="right">
            <form class="form-horizontal" role="form" method="post" action="<?= $action?>">
                <div class="form-group">
                    <label for="outname" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="outname" name="name" value="<?= $name ?>" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="outemail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="outemail" name="email" value="<?= $email ?>" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="outpassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="outpassword" name="password" value="<?= $password ?>" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-success">Submit</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
            </form>
        </div>
    </div>
</div>
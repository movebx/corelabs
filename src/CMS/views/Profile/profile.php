<?php
/*
$getValidationClass = function ($field) use ($errors) {
    return isset($errors[$field])?'has-error has-feedback':'';
};

$getErrorBody = function ($field) use ($errors){
    if (isset($errors[$field])){
        return '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="pull-right small form-error">'.$errors[$field].'</span>';
    }
    return '';
}
*/

?>

<div class="container">
    <?php
        if(!empty($errors))
        {
            foreach($errors as $msg)
    ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Warning!</strong> <?= $msg ?>
            </div>
    <?php
        }
    ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div id="hei" class="col-md-6">
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
                        <input type="password" class="form-control" id="outpassword" name="password" value="<?= $password ?>" placeholder="New password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div id="ip" class="col-md-2"></div>
                        <div class="col-md-3"><div class="well well-sm"><?= $ip ?></div></div>

                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
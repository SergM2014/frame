

<div class="container">
    <a href="<?= \App\Lib\HelperService::currentLang() ?>/"><?= $backToSiteL ?></a>
    <div class="row justify-content-center">




        <form  method="POST" action="<?= \App\Lib\HelperService::currentLang() ?>/admin/login" class="col-sm-auto">
            <h3><?= $adminEntryTitleL ?></h3>
            <input type="hidden" name="_token" value="<?php \App\Lib\TokenService::printTocken('admin') ?>">

            <div class="form-group">
                <label for="login"><?= $loginTitleL ?></label>
                <input type="text" class="form-control <?= @$errors? 'is-invalid' : '' ?>" id="login" name="login"
                       placeholder="admin"  maxlength="25" autofocus value="<?= @$_POST['login'] ?>">
            </div>

            <div class="form-group">
                <label for="password"><?= $passwordL ?></label>
                <input   name="password" class="form-control <?= @$errors? 'is-invalid' : '' ?>" id="password" type="password" maxlength="20" placeholder="admin" >
            </div>
            <!--<p><input type="checkbox" id="remember_me" name="remember_me" >
                <label for="remember_me"><?/*= $rememberMeL */?></label></p>
            <br>-->

            <button type="submit" class="btn btn-primary float-right">OK</button>

        </form>


    </div>
</div>


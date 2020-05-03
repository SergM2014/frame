


<h1 class="alert-danger text-center">Add a form</h1>

<?php includeImageUploadView('/common/partials/addImage.php', 'avatar', '/uploads/avatars/', @$_POST['imageData']) ?>


<form action="/storeform" method="post">

    <input type="hidden" name="_token" id="_token" value="<?= \App\Lib\TokenService::printTocken('addForm') ?>" >
    <input type="hidden" name="imageData" id="imageData" value="<?= @$_POST['imageData'] ?>" >

    <div class="form-group row">
        <label for=name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= $errors['name']? 'is-invalid' : '' ?>" name="name" id="name"
                   placeholder="Name" value="<?= @ $inputs['name'] ?>">
            <div class="invalid-feedback ">
                <?= @$errors['name'] ?>.
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control <?= $errors['email']? 'is-invalid' : '' ?>" name="email" id="email"
                   placeholder="Email" value="<?= @ $inputs['email'] ?>">
            <div class="invalid-feedback ">
               <?= @$errors['email'] ?>.
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control <?= $errors['password']? 'is-invalid' : '' ?>" name="password"
                   id="password" placeholder="Password"  >
            <div class="invalid-feedback">
                <?= @$errors['password'] ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="password2" class="col-sm-2 col-form-label">Password2</label>
        <div class="col-sm-10">
            <input type="password" class="form-control <?= $errors['password2']? 'is-invalid' : '' ?>" name="password2" id="password2" placeholder="Password2" >
            <div class="invalid-feedback">
                <?= @$errors['password2'] ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="textarea" class="col-sm-2 col-form-label">Example textarea</label>
        <div class="col-sm-10">
            <textarea class="form-control <?= $errors['textarea']? 'is-invalid' : '' ?>" name="textarea" id="textarea" rows="3" ><?= @ $inputs['textarea'] ?></textarea>
            <div class="invalid-feedback">
                <?= @$errors['textarea'] ?>
            </div>
        </div>

    </div>


    <div class="form-group row">
        <label for="captcha" class="col-sm-2 col-form-label">captcha</label>
        <div class="col-sm-10">

            <div class="g-recaptcha"  data-callback="imNotARobot" data-sitekey="6Lcqx4sUAAAAAJsNmfsKOrimBIuJ-9pGyYopVYg8"></div>
            <input type="hidden" id="triggerCaptchaErrorField" class="form-control <?= $errors['captcha']? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?= @$errors['captcha'] ?>
            </div>
        </div>

    </div>


    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                    <label class="form-check-label" for="gridRadios1">
                        First radio
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                        Second radio
                    </label>
                </div>
                <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                    <label class="form-check-label" for="gridRadios3">
                        Third disabled radio
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-2">Checkbox</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </div>
</form>
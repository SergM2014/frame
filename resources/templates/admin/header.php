<!DOCTYPE html>
<html lang="<?= $attrLangL ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Admin Part">
    <meta name="description" content="admin part">
    <title>Admin</title>
        <?php if(@$_SESSION['admin']): ?>

        <link href="/assets/css/admin.css?ver=<?= time() ?>" rel="stylesheet">
         
        <?php endif; ?>

        <link href="<?= ROOT ?>/assets/bootstrap-4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
       
    </head>
    <body>


    <?php if(!@$noTemplate): ?>


    <?php includeView('/admin/partials/modal.php'); ?>

        <div class="container">

            <?php if(isset($_SESSION['admin']) ) : ?>

            <header class="main-header ">



                <h1 class="text-center text-secondary"><?= $youAreInAdminL ?></h1>

                <nav class="navbar navbar-expand-lg  navbar-light bg-light">
                    <a class="navbar-brand" href="/admin"><?= $mainPageL ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">

                                <a class="nav-link" href="<?= \App\Lib\HelperService::currentLang() ?>/" ><?= $backToSiteL ?></a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="<?= \App\Lib\HelperService::currentLang() ?>/admin/user" ><?= $usersL ?></a>
                            </li>

                        </ul>

                    <?php if(SHOW_LANGUAGES): ?>

                        <div class="dropdown show  language-dropbox">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= \App\Lib\HelperService::getCurrentLanguageTitle(); ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <?php foreach(\App\Lib\HelperService::prozessLangArray() as $key => $value): ?>
                                    <a class="dropdown-item" href="/<?= \App\Lib\HelperService::overrideLangInUrl($key) ?>"><?= $value ?></a>
                                 <?php endforeach; ?>

                            </div>
                        </div>

                    <?php endif ?>


                    <form class="form-inline my-2 my-lg-0" action="<?= \App\Lib\HelperService::currentLang() ?>/admin/exit" method="post">
                        <input type="hidden" name="_token" value="<?= \App\Lib\TokenService::printTocken('admin') ?>">

                        <button type="submit" class="btn btn-danger"><?= $_SESSION['admin']['login'].' / '. $exitL ?></button>
                    </form>

                </div>
            </nav>




        </header><!--/site-header-->

        <?php endif; ?>

       <section class="content">

    <?php endif; ?>


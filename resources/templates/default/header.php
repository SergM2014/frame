<!DOCTYPE html>
<html lang="<?= $attrLangL ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Learning Resourse">
    <meta name="description" content="Learning Resourse">
    <title>Site description</title>


      <link href="<?= ROOT ?>/assets/css/default.css?ver=<?= time() ?>" rel="stylesheet">
      <link href="<?= ROOT ?>/assets/bootstrap-4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src='https://www.google.com/recaptcha/api.js'></script>

  </head>
    <body>
      <div class="main-container container">
        <?php if(!@$noTemplate): ?>
            <?php includeView('/common/partials/modal.php'); ?>

            <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><?= $mainPageL ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="/image">Image</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/addform">Write us</a>
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

                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

        <?php endif; ?>
       <section class="content container">


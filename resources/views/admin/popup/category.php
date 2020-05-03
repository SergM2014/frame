<a href='<?= \App\Lib\HelperService::currentLang() .'/' .$_POST['processContr'] ?>/create' class='popUp-menu-item'><?= $addL ?></a>
<a href='<?= \App\Lib\HelperService::currentLang() .'/'.$_POST['processContr'] ?>/show?id=<?= (int)$_POST['id'] ?>' class='popUp-menu-item'><?= $showL ?></a>
<a href='<?= \App\Lib\HelperService::currentLang() .'/'.$_POST['processContr'] ?>/edit?id=<?= (int)$_POST['id'] ?>' class='popUp-menu-item'><?= $updateL ?></a>




<form id="delete<?= ucfirst(basename($_POST['processContr'])) ?>" action="<?= \App\Lib\HelperService::currentLang() .'/'.$_POST['processContr']?>/delete" method="post" class="">

    <input type="hidden" name="id" value="<?= (int)$_POST['id'] ?>">
    <input type="hidden" name="_token" value="<?= \App\Lib\TokenService::printTocken('admin') ?>" >


    <button type="button" class="btn btn-link popup-menu-del-btn" id="popUpAdminDelete<?= ucfirst(basename($_POST['processContr'])) ?>" ><?= $deleteL ?></button>

</form>


<?php if(isset($_SESSION['admin'])): ?>

<h2 class="text-center"><?= $adminGreetingsL ?></h2>

<div id="clickMeToPopup" class="pointer">Click me to popup!</div>
<div id="clickMeToModal" class="pointer">Click me to show modal!</div>
<div id="clickMeToAlert" class="pointer">Click me to showalert!</div>

<?php else : ?>

    <?php include PATH_SITE.'/resources/views/admin/partials/login.php'; ?>


<?php endif; ?>

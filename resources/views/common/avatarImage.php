<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><?= $mainPageL ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Image</li>
    </ol>
</nav>

<h2 class="text-center"><?= $addAvatarL ?></h2>


<?php includeImageUploadView('/common/partials/addImage.php', $imageCustomType = 'avatar');


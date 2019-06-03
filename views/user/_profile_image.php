<?php

use yii\helpers\Url;
use yii\bootstrap\Modal;
?>
<div class="row">
    <div class="col-sm-12">
        <img src="<?= $profile->getProfilePicture() ?>" class='img img-circle' style='width: 100px; height: 100px'/>
        <?php if (Yii::$app->user->id === $model->userid): ?>
        <span hidden="trueb">
                <i class="glyphicon glyphicon-pencil" title="Update Profile Image" id="btnUpdateProfilePicture" style="color: blue;cursor: pointer"></i>
            </span>
        <?php endif; ?>
    </div>
</div>




<div class="profile-image-modal">

    <?php
    Modal::begin([
        'header' => 'Update Profile Image',
        'size' => Modal::SIZE_LARGE,
        'id' => 'profileImageModal',
    ]);
    ?>
    <h1>It works too</h1>
    <?php
    Modal::end();
    ?>
</div> 

<div class="hidden-btn" hidden="">
    <input type="file" accept="*" id="fileInput" name="profileImage"/>
</div>

<script>

    $('#btnUpdateProfilePicture').click(() => {
       $('#fileInput').click();
    });

</script>

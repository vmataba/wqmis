<?php
$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="report-dimension">
    <?=
    $this->render('_form', [
        'model' => $model
    ])
    ?>
</div>

<br>

<div class="report-area">

    <?= $this->render('_report', ['qualities' => $qualities]) ?>

</div>


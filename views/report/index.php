<?php
$this->title = 'Water quality Reports';
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

    <?php if ( count($qualities) > 0):?>
    
    <?= $this->render('_report', ['qualities' => $qualities]) ?>
    
    <?php endif;?>
    
    <?php if (count($qualities) == 0):?>
    <h1 class='text-center'>Select valid report periods! </h1>

    <?php endif;?>


</div>


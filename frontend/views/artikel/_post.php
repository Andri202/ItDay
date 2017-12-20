<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->judul) ?></h2>

    <?= HtmlPurifier::process($model->artikel) ?>

    <?= Html::a("Baca Selengkapnya....", ['view', 'id' => $model->id]) ?>    
</div>
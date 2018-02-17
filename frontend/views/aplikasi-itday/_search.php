<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AplikasiItdaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aplikasi-itday-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'aplikasi') ?>

    <?= $form->field($model, 'poster') ?>

    <?php // echo $form->field($model, 'video') ?>

    <?php // echo $form->field($model, 'folder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

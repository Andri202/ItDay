<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-form">

    <?php $form = ActiveForm::begin();  ?>



    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poster')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
          ]);   ?>

    <?= $form->field($model, 'video')->fileinput() ?>

    <?= $form->field($model, 'artikel')->widget(TinyMce::className(), [
    'options' => ['rows' => 15],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    	]
	]);?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

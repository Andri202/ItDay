<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AplikasiItday */

$this->title = 'Create Aplikasi Itday';
$this->params['breadcrumbs'][] = ['label' => 'Aplikasi Itdays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aplikasi-itday-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

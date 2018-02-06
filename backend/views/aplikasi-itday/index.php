<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AplikasiItdaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aplikasi Itdays';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="aplikasi-itday-index box box-success">
    
    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    
    <div class="box-body">
        <p>
            <?= Html::a('Create Aplikasi Itday', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'judul',
                'deskripsi:ntext',
                'aplikasi',
                'poster',
                // 'video',
                // 'folder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

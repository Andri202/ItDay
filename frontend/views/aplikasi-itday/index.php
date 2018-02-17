<style type="">
    .header {
        width: 100%;
        height: 80px;
        background-color: #000000;
    }
    .aplikasi-itday-index{
        margin-top: 20px;
    }
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AplikasiItdaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aplikasi Itdays';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    &nbsp;
</div>
<div class="container">
    <div class="aplikasi-itday-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'judul',
                'deskripsi:ntext',
                'aplikasi',
                'poster',
                //'video',
                //'folder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Artikel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'judul',
            'artikel',
            [
                'attribute' => 'poster',
                'format' => 'raw',
                'value'=> function($data){
                    if ($data->poster!=''){
                        return $data->getPoster(['width'=>'80px']);
                    }else {
                        return 'no image';
                    }
                }
            ],
            [
                'attribute' => 'video',
                'format' => 'raw',  // or html
                'value' => function  ($data)  {
                    if ($data->video!=''){
                        return 'video';
                    }else {
                        return 'no video';
                    }
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

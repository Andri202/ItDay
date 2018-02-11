<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AplikasiItday */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aplikasi Itdays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="aplikasi-itday-view box box-success">

    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'judul',
                'aplikasi',
                [
                    'attribute' => 'poster',
                    'format' => 'raw',
                    'value'=> function($data){
                        if ($data->poster!=''){
                            return $data->getPoster(['height'=>'100px']);
                        }else {
                            return 'no image';
                        }
                    }
                ],
                [
                    'attribute' => 'video',
                    'format' => 'raw',  // or html
                    'value' => function  ($data)  {
                        if ($data->video!= null){
                            return $data->getVideo();
                        }else {
                            return 'no video';
                        }  
                  }
                ],
                'deskripsi:ntext',  
            ],
        ]) ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-index">


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        
    ]); 
    ?>
</div>


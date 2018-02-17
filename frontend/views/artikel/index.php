<style type="">
	.header {
		width: 100%;
		height: 80px;
		background-color: #000000;
	}
</style>
<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikels';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
	&nbsp;
</div>

<div class="container">
	<div class="artikel-index">


	    <?= ListView::widget([
	        'dataProvider' => $dataProvider,
	        'itemView' => '_post',
	        
	    ]); 
	    ?>
	</div>

</div>


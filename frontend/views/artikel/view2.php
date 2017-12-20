<?php
use yii\helpers\Html;
	$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
	echo "
	<table>
			<tr>
				<td>".$model->getPoster()."".$model->artikel."</td>
			</tr>
			<tr>
				<td>".$model->getVideo();"</td>
			</tr>
	</table>
	";
	// echo $model->getPoster();
 //    echo $model->artikel;

 //    echo "<br>";
 //                    if ($model->video!=''){
 //                       echo $model->getVideo();
 //                    }else {
 //                        echo "no video";
 //                    }
 //    echo "<br>";
?>
</div>
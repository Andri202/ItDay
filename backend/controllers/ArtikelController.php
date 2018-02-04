<?php

namespace backend\controllers;

use Yii;
use app\models\Artikel;
use app\models\ArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArtikelController implements the CRUD actions for Artikel model.
 */
class ArtikelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Artikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artikel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Artikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Artikel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            

            $name = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            $structure = '../../file/'.$name;

            // To create the nested structure, the $recursive parameter 
            // to mkdir() must be specified.

            if (!mkdir($structure, 0777, true)) {
                die('Failed to create folders...');
            }else{
                $model->folder = $structure;
            }

            $img = UploadedFile::getInstance($model, 'img_upload');
            if (!empty($img)) {
                if(is_object($img))
                {
                    
                    $model->poster = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));//Formats a date, time or datetime in a float number as UNIX timestamp (seconds since 01-01-1970).
                    
                    $model->poster .='.'.$img->extension;

                    $path = $structure."/".$model->poster; //represent file paths or URLs // @app: Your application root directory
                    $img->saveAs($path, false);
                }
            }
                
            $video = UploadedFile::getInstance($model, 'video_upload');
            if (!empty($video)) {
                if(is_object($video))
                {
                    $model->video .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                    $model->video .='.'.$video->extension;

                    $path = $structure."/".$model->video;
                    $video->saveAs($path, false);
                } 
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Artikel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $dir = $model->folder;

            foreach (glob($dir."/*.*") as $filename) {
                if (is_file($filename)) {
                    unlink($filename);
                }
            }

            $img = UploadedFile::getInstance($model, 'img_upload');
            if (!empty($img)) {
                if(is_object($img))
                {
                    
                    $model->poster = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));//Formats a date, time or datetime in a float number as UNIX timestamp (seconds since 01-01-1970).
                    
                    $model->poster .='.'.$img->extension;

                    $path = $structure."/".$model->poster; //represent file paths or URLs // @app: Your application root directory
                    $img->saveAs($path, false);
                }
            }
                
            $video = UploadedFile::getInstance($model, 'video_upload');
            if (!empty($video)) {
                if(is_object($video))
                {
                    $model->video .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                    $model->video .='.'.$video->extension;

                    $path = $structure."/".$model->video;
                    $video->saveAs($path, false);
                } 
            } 

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Artikel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */



    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $dir = $model->folder;

        foreach (glob($dir."/*.*") as $filename) {
            if (is_file($filename)) {
                unlink($filename);
            }
        }
        rmdir($dir);

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Artikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artikel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

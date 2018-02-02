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
            $img = UploadedFile::getInstance($model, 'poster');

            if(is_object($img))
            {
                $model->poster = $img->basename; //Returns trailing name component of path
                $model->poster .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));//Formats a date, time or datetime in a float number as UNIX timestamp (seconds since 01-01-1970).
                $model->poster .='.'.$img->extension;

                $path = '../../file/'.$model->poster; //represent file paths or URLs // @app: Your application root directory
                $img->saveAs($path, false);
            }
            $video = UploadedFile::getInstance($model, 'video');
            if(is_object($video))
            {
                $model->video = $video->basename; //Returns trailing name component of path
                $model->video .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));//Formats a date, time or datetime in a float number as UNIX timestamp (seconds since 01-01-1970).
                $model->video .='.'.$video->extension;

                $path = '../../file/'.$model->video; //represent file paths or URLs // @app: Your application root directory
                $video->saveAs($path, false);
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
            $img = UploadedFile::getInstance($model, 'poster');

            if(is_object($img))
            {
                $model->poster = $img->basename; //Returns trailing name component of path
                $model->poster .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));//Formats a date, time or datetime in a float number as UNIX timestamp (seconds since 01-01-1970).
                $model->poster .='.'.$img->extension;

                $path = '../../file/'.$model->poster; //represent file paths or URLs // @app: Your application root directory
                $img->saveAs($path, false);
            }
            
            $video = UploadedFile::getInstance($model, 'video');
            if(is_object($video))
            {
                $model->video = $video->basename; //Returns trailing name component of path
                $model->video .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));//Formats a date, time or datetime in a float number as UNIX timestamp (seconds since 01-01-1970).
                $model->video .='.'.$video->extension;

                $path = '../../file/'.$model->video; //represent file paths or URLs // @app: Your application root directory
                $video->saveAs($path, false);
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

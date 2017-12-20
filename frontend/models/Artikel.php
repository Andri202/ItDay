<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id
 * @property string $judul
 * @property string $artikel
 * @property string $poster
 * @property string $video
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'artikel', 'poster', 'video'], 'required'],
            [['judul'], 'string', 'max' => 255],
            [['artikel'], 'string', 'max' => 1024],
            [['poster'], 'string', 'max' => 35],
            [['video'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'artikel' => 'Artikel',
            'poster' => 'Poster',
            'video' => 'Video',
        ];
    }

    public function getPoster($htmlOptions=[])
    {
        return Html::img('../../file/img'.$this->poster, ['width' => '350','align'=>'right']);
    }
    
    public function getVideo()
    {
        return '<video width="320" height="240" controls>
                              <source src="../../file/video'.$this->video.'" type="video/mp4">
                </video>' ;
    }

}

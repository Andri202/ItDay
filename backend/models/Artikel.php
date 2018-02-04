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
            [['judul', 'artikel', 'img_upload', 'video_upload'], 'required'],
            [['judul'], 'string', 'max' => 255],
            [['folder'], 'string', 'max' => 255],
            [['artikel'], 'string', 'max' => 1024],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['video'], 'file'],
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
            'folder' => 'Folder',
        ];
    }

    public function getPoster($htmlOptions=[])
    {
        return Html::img($this->folder."/".$this->poster,$htmlOptions);
    }
    
    public function getVideo()
    {
        return '<video width="320" height="240" controls>
                              <source src="'.$this->folder."/".$this->video.'" type="video/mp4">
                </video>' ;
    }

    public function getJudul()
    {
        return $this->judul;
    }
}

<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "aplikasi_itday".
 *
 * @property integer $id
 * @property string $judul
 * @property string $deskripsi
 * @property string $aplikasi
 * @property string $poster
 * @property string $video
 * @property string $folder
 */
class AplikasiItday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aplikasi_itday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'aplikasi'], 'required'],
            [['deskripsi'], 'string'],
            [['judul', 'aplikasi'], 'string', 'max' => 255],
            [['poster'], 'safe'],
            [['poster'], 'file', 'extensions'=>'jpg, gif, png'],
            [['video'], 'safe'],
            [['video'], 'file', 'extensions' => 'mp4'],
            [['folder'], 'string', 'max' => 50],
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
            'deskripsi' => 'Deskripsi',
            'aplikasi' => 'Link Aplikasi',
            'poster' => 'Poster',
            'video' => 'Video',
            'folder' => 'Folder',
        ];
    }

    public function getJudul()
    {
        return $this->judul;
    }

    Public function getPosterName() //sama aja
    {
        $model = AplikasiItday::find()
            ->andWhere(['id' => $this->id])
            ->one();

        if ($model !== null) {
            return $model->poster;;
        }

    }

    Public function getVideoName() //sama aja
    {
        $model = AplikasiItday::find()
            ->andWhere(['id' => $this->id])
            ->one();

        if ($model !== null) {
            return $model->video;;
        }
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

        public function getNamaJenis() //sama aja
    {
        $model = AplikasiItday::find()
            ->andWhere(['id' => $this->ids])
            ->one();

        if ($model !== null) {
            return $model->nama;
        } else {
            return null;
        }


    }
}

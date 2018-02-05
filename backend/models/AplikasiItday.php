<?php

namespace app\models;

use Yii;

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
            [['deskripsi'], 'string'],
            [['aplikasi', 'folder'], 'required'],
            [['judul', 'aplikasi'], 'string', 'max' => 255],
            [['poster', 'video'], 'string', 'max' => 25],
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
            'aplikasi' => 'Aplikasi',
            'poster' => 'Poster',
            'video' => 'Video',
            'folder' => 'Folder',
        ];
    }
}

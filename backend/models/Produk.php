<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "produks".
 *
 * @property int $id
 * @property string $nama
 * @property string $gambar
 * @property string $deskripsi
 * @property int $stok
 * @property string $harga
 */
class Produk extends \yii\db\ActiveRecord

{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    // gambar is image file
    public function rules()
    {
        return [
            [['nama', 'deskripsi', 'stok', 'harga'], 'required'],
            [['deskripsi'], 'string'],
            [['stok'], 'integer'],
            [['harga'], 'number'],
            [['nama'], 'string', 'max' => 255],
            [['nama'], 'unique'],
            [['gambar'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['nama', 'gambar', 'deskripsi', 'stok', 'harga'];
        $scenarios['update'] = ['nama', 'gambar', 'deskripsi', 'stok', 'harga'];
        return $scenarios;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $uploadedFile = UploadedFile::getInstance($this, 'gambar');
            if ($uploadedFile !== null) {
                $this->deleteOldImage();
                $this->gambar = $this->upload($uploadedFile);
            }
            return true;
        } else {
            return false;
        }
    }

    public function deleteOldImage()
    {
        if (!$this->isNewRecord) {
            $oldImage = $this->getOldAttribute('gambar');
            $uploadPath = Yii::getAlias('@app') . '/web/uploads/';
            $filePath = $uploadPath . $oldImage;

            if (is_file($filePath)) {
                unlink($filePath);
            }
        }
    }

    public function deleteFrontendImage()
    {
        if (!$this->isNewRecord) {
            $oldImage = $this->getOldAttribute('gambar');
            $uploadPath = '../../frontend/web/uploads/';
            $filePath = $uploadPath . $oldImage;

            if (is_file($filePath)) {
                unlink($filePath);
            }
        }
    }

    public function upload($uploadedFile)
    {
        $uploadPath = Yii::getAlias('@app') . '/web/uploads/';
        $uploadPath2 = '../../frontend/web/uploads/';

        if (!is_dir($uploadPath) && !is_dir($uploadPath2)) {
            if (!mkdir($uploadPath, 0777, true) && !mkdir($uploadPath2, 0777, true)) {
                return false;
            }
        }
        $filename = Yii::$app->security->generateRandomString(10) . '.' . $uploadedFile->extension;
        $filePath = $uploadPath . $filename;
        $filePath2 = $uploadPath2 . $filename;

        if ($uploadedFile->saveAs($filePath) && copy($filePath, $filePath2)) {
            return $filename;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'gambar' => 'Gambar',
            'deskripsi' => 'Deskripsi',
            'stok' => 'Stok',
            'harga' => 'Harga',
        ];
    }
}

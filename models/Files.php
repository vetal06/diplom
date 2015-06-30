<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "files".
 *
 * @property integer $id
 * @property string $name
 * @property integer $size
 * @property string $path
 * @property string $description
 * @property integer $visable_type
 * @property string $password
 * @property integer $user_id
 * @property integer $subject_id
 *
 * @property User $user
 * @property Subject $subject
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public $first_name;
    public $department_name;
    public $faculty_name;
    public $subject_name;
    public $last_name;
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['size', 'visable_type', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['path'], 'string', 'max' => 200],
            [['password'], 'string', 'max' => 256],
            ['subject_id', 'safe'],
            //[['file'], 'file', 'skipOnEmpty' => false,]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'size' => 'Размер',
            'path' => 'Путь',
            'description' => 'Описание',
            'visable_type' => 'Показать?',
            'password' => 'Пароль',
            'user_id' => 'Пользователь',
            'file' => 'Файл',
            'subject_id' => 'Предмет',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'department_name' => 'Кафедра',
            'faculty_name' => 'Факультет',
            'subject_name' => 'Предмет',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
    public function upload()
    {
        if ($this->validate()) {
            $path = dirname(__DIR__).'\\uploads\\'. $this->file->baseName .time(). '.' . $this->file->extension;
            $this->file->saveAs($path);
            $this->path = $path;
            $this->size = $this->file->size;
            return true;
        } else {
            return false;
        }
    }
}

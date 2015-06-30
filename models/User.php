<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $birthday
 * @property integer $paul
 * @property string $phone
 * @property string $data_added
 * @property integer $department_id
 * @property string $middle_name
 *
 * @property Content[] $contents
 * @property Files[] $files
 * @property SubjectHasUser[] $subjectHasUsers
 * @property Department $department
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'email', 'password', 'department_id'], 'required'],
            [['birthday', 'data_added', 'middle_name'], 'safe'],
            [['paul', 'department_id'], 'integer'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Email',
            'password' => 'Пароль',
            'birthday' => 'Дата рождения',
            'paul' => 'Пол',
            'phone' => 'Телефон',
            'data_added' => 'Дата регистрации',
            'department_id' => 'Кафедра',
            'middle_name' => 'Отчесво',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectHasUsers()
    {
        return $this->hasMany(SubjectHasUser::className(), ['user_id' => 'id', 'user_department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}

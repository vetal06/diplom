<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

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
 *
 * @property Content[] $contents
 * @property Files[] $files
 * @property SubjectHasUser[] $subjectHasUsers
 * @property Department $department
 */

class UserDb extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $username;
    public $auth_key;
    public $accessToken;

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
            [['first_name', 'last_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 16],
            ['email', 'validateEmail'],
        ];
    }
    public function validateEmail($attribute, $params){
        if (!$this->hasErrors()) {
            if(empty($this->id)){
                $user = UserDb::find()->where(['email'=>$this->email])->one();
                if($user != null)
                    $this->addError($attribute, 'Пользователь с таким email уже существует!');
            }

        }
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
            'middle_name' => 'Отчество',
            'email' => 'Email',
            'password' => 'Пароль',
            'birthday' => 'Дата рождения',
            'paul' => 'Пол',
            'phone' => 'Телефон',
            'data_added' => 'Дата регистрации',
            'department_id' => 'Кафедра',
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

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);

    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);

    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;

    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;

    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;

    }
    public function validatePassword($password){
        if(md5($password)==$this->password){
            return true;
        }else
            return false;
    }
    public function setPassword($password){
        $this->password = md5($password);
    }
}

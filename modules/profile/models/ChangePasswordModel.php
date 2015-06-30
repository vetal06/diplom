<?php

namespace app\modules\profile\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $body
 * @property string $data
 * @property integer $user_id
 * @property string $title
 *
 * @property User $user
 */
class ChangePasswordModel extends Model
{
    public $password;
    public $newPassword;
    public $newPassword2;
    public function rules()
    {
        return [
            ['password', 'currentPasswordValidation'],
            ['password', 'required'],
            ['newPassword', 'string', 'min' => 6],
            ['newPassword2', 'compare', 'compareAttribute'=>'newPassword'],
        ];
    }

    public function currentPasswordValidation($attribute, $params){
        $user = \Yii::$app->user->identity;
        if(!$user->validatePassword($this->password)){
            $this->addError($attribute, 'Неверный пароль');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Старый пароль',
            'newPassword' => 'Новый пароль',
            'newPassword2' => 'Подтверждение пароля',
        ];
    }
}

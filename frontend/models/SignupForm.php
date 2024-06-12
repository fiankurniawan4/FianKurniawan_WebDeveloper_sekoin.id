<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nama;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nama', 'trim'],
            ['nama', 'required'],
            ['nama', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
            ['password', 'match', 'pattern' => '/[A-Z]/', 'message' => 'Password should contain at least one uppercase letter.'],
            ['password', 'match', 'pattern' => '/\d/', 'message' => 'Password should contain at least one digit.'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->setPassword($this->password);

        return $user->save();
    }
}

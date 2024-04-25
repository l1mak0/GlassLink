<?php

namespace app\models;

class ResgistrationModel extends \yii\base\Model
{
    public $phone;
    public $password;
    public $passwordRepeat;

    public function rules()
    {
        return [
          [['phone','password', 'passwordRepeat'], 'required'],
          ['phone', 'validatePhone'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['password', 'length' => [8,12]]
        ];
    }
}
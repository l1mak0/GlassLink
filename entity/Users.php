<?php

namespace app\entity;

use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use app\repository\UserRepository;

use app\entity\SaleCard;
use app\entity\Reserves;
use app\entity\Orders;

/*
 * @property integer id
 * @property string phone
 * @property string password
 * @property string name
 * @property string surname
 * @property string birthday
 */

class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{


    public static function findIdentity($id)
    {
       return new static(UserRepository::getUserById($id));
    }


    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function findUserByPhone($phone)
    {
        return new static(UserRepository::getUserByPhone($phone));
    }

    public function getSaleCard()
    {
        return $this->hasOne(SaleCard::class, ['user_id' => 'id']);
    }

    public function getLastReserves()
    {
        return $this->hasOne(Reserves::class, ['user_id' => 'id']);
    }

    public function getReserves()
    {
        return $this->hasOne(Reserves::class, ['user_id' => 'id']);
    }


    public function getLastOrder()
    {
        return $this->hasOne(Orders::class, ['user_id' => 'id']);
    }

    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['user_id' => 'id']);
    }


    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
    public static function findIdentityByAccessToken($token, $type = null){}
}
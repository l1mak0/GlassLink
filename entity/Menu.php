<?php

namespace app\entity;

use yii\db\ActiveRecord;

class Menu extends \yii\db\ActiveRecord
{
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }
}
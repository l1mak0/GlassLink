<?php

namespace app\models;

class CategoryForm extends \yii\base\Model
{
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title','description'], 'required'],
            ['description', 'string', 'length' => [10,200]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание'
        ];
    }

}
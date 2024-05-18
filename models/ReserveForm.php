<?php

namespace app\models;

class ReserveForm extends \yii\base\Model
{
    public $table;
    public $start_time;
    public $end_time;
    public $not_order = false;
    public $menu = [];

    public function rules()
    {
        return[
            [['table', 'start_time'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return[
            'table' => 'Номер столика',
            'start_time' => 'Начало резерва',
            'end_time' => 'Конец резерва',
            'menu' => 'Меню',
            'not_order' => 'Закажу потом',
        ];
    }
}
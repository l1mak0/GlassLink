<?php

namespace app\controllers;

use yii\filters\AccessControl;

class MenuController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => 'admin'
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $this->view->title = 'Добавление нового блюда';
        var_dump("gfgfdgfdf");
    }
}
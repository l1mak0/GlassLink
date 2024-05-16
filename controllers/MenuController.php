<?php

namespace app\controllers;

use app\models\CategoryForm;
use app\repository\CategoryRepository;
use yii\filters\AccessControl;

class MenuController extends \yii\web\Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::class,
//                'rules' => [
//                    [
//                        'actions' => ['create'],
//                        'allow' => true,
//                        'roles' => ['admin']
//                    ],
//                ],
//            ],
//        ];
//    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateMenu()
    {
        $this->view->title = 'Добавление нового блюда';
        $
    }

    public function actionCreateCategory()
    {
        $this->view->title = "Создание категории";
        $model = new CategoryForm;
        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
            $catId = CategoryRepository::createNewCategory(
                $model->title,
                $model->description
            );
            if ($catId){
                return $this->redirect('/menu/');
            }
        }
        return $this->render('create-category', ['model' => $model]);
    }

}
<?php

namespace app\controllers;

use app\entity\Users;
use app\models\RegistrationModel;
use app\repository\SaleCardRepository;
use app\repository\UserRepository;
use yii\web\Controller;
use Yii;


class UserController extends Controller
{
    public function actionRegistration()
    {
        $this->view->title = 'Страница регистрации';
        $model = new RegistrationModel();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $userId = UserRepository::createUser(
                $model->phone,
                $model->password
            );
            if ($userId) {
                SaleCardRepository::createCard($userId);
                Yii::$app->user->login(Users::findIdentity($userId));
                return $this->goHome();
            }
        }
        return $this->render('registration', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionAuthorisation()
    {
        $this->view->title = "Страница авторизации";

        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new AuthForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goHome();
        }
        return $this->render('authorisation', ['model' => $model]);
    }
}
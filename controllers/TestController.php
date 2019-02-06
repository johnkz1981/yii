<?php

namespace app\controllers;

use app\models\Product;
use app\models\Task;
use app\models\User;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\components\TestService;

class TestController extends Controller
{
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        // 'only' => ['logout'],
        'rules' => [
          [
            // 'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
    ];
  }

  public function actionIndex()
  {
    $testView = \Yii::$app->test->run();

    /*$user = User::findOne(29);
    $user->username = 'JohnKZ6';
    $user->password = '1010';

    $user->save();

    _end($user);*/

    $user = User::findByUsername('ivan2');
    _end($user->validatePassword('4565'));

    /*$user = User::findOne(18);
    $user->username = 'DDD';
    $user->save();
    _end($user);*/

    $task = Task::findOne(5);
    $task->title = 'retewrt3';
    $task->description = 'desc werwer2';
    $task->save();
    _end($task);
    // $user->touch('sdfgsd');

    // _end($user->getErrors());

    /*return $this->render('index', [
      'data' => $testView,
      // 'model' => $model
    ]);*/
  }
}

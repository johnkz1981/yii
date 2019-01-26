<?php

namespace app\controllers;

use app\models\Product;
use app\models\Task;
use app\models\User;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\components\TestService;

class TestController extends Controller
{
  public function actionIndex()
  {
    $testView = \Yii::$app->test->run();

    $model = User::findOne(2);
    $task = Task::findOne(3);

    $model->link('sharedTasks', $task);

    /*$task->link('creator', $model);

    $model = User::findOne(3);

    _end($model->getSharedTasks()->all());

    foreach (User::findAll([1, 3, 5]) as $model) {
      $model->createdTasks;
    }

    _end($model);*/

    return $this->render('index', [
      'data' => $testView,
      'model' => $model
    ]);
  }
}

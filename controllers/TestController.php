<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;
use app\components\TestService;

class TestController extends Controller
{
  public function actionIndex()
  {
    $testView =  \Yii::$app->test->run();

    $model = new Product();
    $model->id = 11;
    $model->name = 'John';
    $model->price = 10000;

    return $this->render('index', [
      'data' => $testView,
      'model' => $model
    ]);
  }
}

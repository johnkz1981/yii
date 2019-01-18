<?php

namespace app\controllers;

use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\components\TestService;

class TestController extends Controller
{
  public function actionIndex()
  {
    $testView = \Yii::$app->test->run();

    $model = new Product();
    $model->id = 11;
    $model->name = '   John<b>   ';
    $model->price = 10000;

    $list = [
      ['id' => 11, 'name' => 'john', 'category' => 23],
      ['id' => 12, 'name' => 'john2', 'category' => 23],
      ['id' => 13, 'name' => 'john3', 'category' => 28],
    ];
    $model->validate();

    return VarDumper::dumpAsString(
      $model->getAttributes(),
      5, true
    );

    return $this->render('index', [
      'data' => $testView,
      'model' => $model
    ]);
  }
}

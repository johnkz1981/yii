<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;

class TestController extends Controller
{
  public function actionIndex()
  {
    $model = new Product();
    $model->id = 11;
    $model->name = 'John';
    $model->price = 10000;

    return $this->render('index', [
      'data' => 12345,
      'model' => $model
    ]);
  }
}

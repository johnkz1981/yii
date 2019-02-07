<?php

namespace app\controllers;

use app\models\Product;
use app\models\Task;
use app\models\User;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
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

    \Yii::setAlias('tmp', '/tmp/sdfsdf');

    return \Yii::getAlias('@tmp/web/index.php');

    // _end($user->getErrors());

    /*return $this->render('index', [
      'data' => $testView,
      // 'model' => $model
    ]);*/
  }
}

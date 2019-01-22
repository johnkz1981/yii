<?php

namespace app\controllers;

use app\models\Product;
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

    $model = new Product();
    /*$model->id = 11;
    $model->name = '   John<b>   ';
    $model->price = 20;*/

    /*$list = [
      ['id' => 11, 'name' => 'john', 'category' => 23],
      ['id' => 12, 'name' => 'john2', 'category' => 23],
      ['id' => 13, 'name' => 'john3', 'category' => 28],
    ];*/
    $model->setAttributes(['id' => 15, 'name' => 'johnkz5']);

    $dateInt = \Yii::$app->formatter->asTimestamp('now');

    /*$result = \Yii::$app->db->createCommand()->batchInsert(
      'user',
      ['username', 'password_hash', 'creator_id', 'created_at'],
      [
        ['Petr', '12312', 1, $dateInt],
        ['John', '456', 1, $dateInt],
        ['Mark', '789', 1, $dateInt],
        ['Roma', '566', 1, $dateInt],
      ]);

    _end($result->execute());*/

    /*$result = \Yii::$app->db->createCommand()->insert(
      'user',
        ['username' => 'Anna', 'password_hash' => '12312', 'creator_id' => 1, 'created_at' => $dateInt]
      );

    _end($result->execute());*/


    $query = new Query();
    // $result = $query->from('user')->where(['id' => 1])->one();

    // $result = $query->from('user')->where(['>', 'id', 1])->orderBy(['username' => SORT_DESC])->all();

    // $result = $query->from('user')->count('*');

    /*$result = \Yii::$app->db->createCommand()->batchInsert(
      'task',
      ['title', 'description', 'creator_id', 'created_at'],
      [
        ['run', 'run task', 1, $dateInt],
        ['halt', 'halt task', 2, $dateInt],
        ['stop', 'stop task', 3, $dateInt],
      ]);

    _end($result->execute());*/

    $result = $query->from('task')->innerJoin('user', 'user.id = task.creator_id')->all();

    _end($result);

    return $this->render('index', [
      'data' => $testView,
      'model' => $model
    ]);
  }
}

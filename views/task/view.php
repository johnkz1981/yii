<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['my']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      'title',
      'description:ntext',
      'creator_id',
      'updater_id',
      'created_at:datetime',
      'updated_at:datetime',
    ],
  ]) ?>

  <?php

  \yii\helpers\VarDumper::dump($dataProvider, 10, true);
  ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      'title',
      'description:ntext',
      'created_at:datetime',
      'updated_at:datetime',
      [
        'label' => 'users',
        'content' => function (\app\models\Task $model) {

          $users = $model->getSharedUsers()->select('username')->column();
          return join(',', $users);
        }
      ],

      [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{delete}',
      ],
    ],
  ]); ?>
  <?php// Pjax::end(); ?>

</div>

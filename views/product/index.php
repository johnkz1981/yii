<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php Pjax::begin(); ?>

  <p>
    <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'id',
      [
        'attribute' => 'Наименование',
        'value' => function($model) {
          return
            Html::a(mb_strtoupper($model->name), ['view', 'id' => $model->id], ['class' => 'btn btn-success'])
          ;
        },
        'format' => 'html'
      ],
      'price',
      'category',
      'created_at',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>
  <?php Pjax::end(); ?>
</div>

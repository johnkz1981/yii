<?php
/** @var $this yii\web\View */
/** @var $data int */
/** @var $model \app\models\Product */
?>

Test view
<?= $data ?>
<?= $model->id ?>
<?= $model->name ?>
<?= \yii\widgets\DetailView::widget(['model' => $model]) ?>
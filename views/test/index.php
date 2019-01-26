<?php
/** @var $this yii\web\View */
/** @var $data int */
/** @var $model \app\models\User */
?>

Test view
<?= $data ?>
<?= $model->id ?>
<?= $model->username ?>
<?= \yii\widgets\DetailView::widget(['model' => $model]) ?>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $comments common\models\Comments */
/* @var $commentsProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Add new post'), ['create', 'id' => $model->id], [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'created_at',
        ],
    ]) ?>

    <h4>Comments for post:</h4>
    <?= GridView::widget([
        'dataProvider' => $commentsProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'created_at',
            'description:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'comments'
            ],
        ],
    ]); ?>

    <h3>Leave your comment here:</h3>

    <?= $this->render('/comments/_form', [
            'model' => $comments,
            'actionComments' => '/comments/create',
            ]) ?>

</div>

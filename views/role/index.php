<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var ekalokman\AdminPgsql\models\AuthItemSearch $searchModel
 */
$this->title = Yii::t('rbac-admin', 'Roles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Create Role'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-solid box-primary">
        <div class="box-body table-responsive with-border">
            <?php
            Pjax::begin([
                'enablePushState'=>false,
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('rbac-admin', 'Name'),
                    ],
                    [
                        'attribute' => 'description',
                        'label' => Yii::t('rbac-admin', 'Description'),
                    ],
                    ['class' => 'yii\grid\ActionColumn',],
                ],
            ]);
            Pjax::end();
            ?>
        </div>
    </div>

</div>

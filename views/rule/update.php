<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var ekalokman\AdminPgsql\models\AuthItem $model
 */
$this->title = Yii::t('rbac-admin', 'Update Rule') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('rbac-admin', 'Update');
?>
<div class="auth-item-update">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>

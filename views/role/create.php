<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var ekalokman\AdminPgsql\models\AuthItem $model
 */

$this->title = Yii::t('rbac-admin', 'Create Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <div class="box box-solid box-primary">
          <div class="box-body table-responsive with-border">
            <?php echo $this->render('_form', [
                'model' => $model,
            ]); ?>
        </div>
    </div>

</div>

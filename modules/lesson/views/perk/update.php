<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\lesson\models\Perk */

$this->title = 'Update Perk: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

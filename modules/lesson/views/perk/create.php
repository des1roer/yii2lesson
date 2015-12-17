<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\lesson\models\Perk */

$this->title = 'Create Perk';
$this->params['breadcrumbs'][] = ['label' => 'Perks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

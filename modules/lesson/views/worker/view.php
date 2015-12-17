<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\lesson\models\Worker */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'dep_id',
            ['label' => 'атрибут', 'value' => $model->dep->name,],
            [
                'format' => 'raw',
                'label' => 'Навыки',
                'value' => $model->myperks,
            ],
            [
                'attribute' => 'img',
                'value' => $model->imageurl,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
        ],
    ])
    ?>

</div>

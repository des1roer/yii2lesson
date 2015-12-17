<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\lesson\models\Dep;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\lesson\models\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Workers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Create Worker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]) ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name:ntext',
            [
                'attribute' => 'dep_id',
                'format' => 'raw',
                'filter' => ArrayHelper::map(Dep::find()->all(), 'id', 'name'),
                'value' => 'dep.name'
            ],
            [
                'format' => 'raw',
                'label' => 'Навыки',
                'value' => function($data)
                {
                    return $data->myperks;
                },
            ],
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function($data)
                {
                    return Html::img($data->imageurl, ['width' => '100']);
                },
            ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
            <?php Pjax::end() ?>
</div>

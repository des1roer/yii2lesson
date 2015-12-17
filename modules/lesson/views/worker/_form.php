<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\lesson\models\Dep;
use app\modules\lesson\models\Perk;

use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $model app\modules\lesson\models\Worker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Dep::find()->all(), 'id', 'name')) ?>
    <?=
            $form->field($model, 'perks_list')
            ->dropDownList(ArrayHelper::map(Perk::find()->all(), 'id', 'name'), ['multiple' => true])
    ?>


    

    <?= $form->field($model, 'img')->fileInput() ?>

    <?php echo ($model->img) ? Html::img('/uploads/' . $model->img, ['width' => 100, 'height' => 100]) : null ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GlobalTestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="global-test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'STATIONID') ?>

    <?= $form->field($model, 'UUTNAME') ?>

    <?= $form->field($model, 'PARTNUMBER') ?>

    <?= $form->field($model, 'SERIALNUMBER') ?>

    <?php // echo $form->field($model, 'TECHNAME') ?>

    <?php // echo $form->field($model, 'TESTDATE') ?>

    <?php // echo $form->field($model, 'TIMESTART') ?>

    <?php // echo $form->field($model, 'TIMESTOP') ?>

    <?php // echo $form->field($model, 'UUTPLACE') ?>

    <?php // echo $form->field($model, 'TESTMODE') ?>

    <?php // echo $form->field($model, 'GLOBALRESULT') ?>

    <?php // echo $form->field($model, 'VERSIONS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

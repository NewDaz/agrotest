<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Booksrubrics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booksrubrics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_books')->textInput() ?>

    <?= $form->field($model, 'id_rubrics')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

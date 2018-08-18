<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rubrics */

$this->title = Yii::t('app', 'Create Rubrics');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rubrics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubrics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

/* @var $this yii\web\View */
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$script=<<< JS
$(document).ready(function(){
$("#text").keyup(function(){
_this = this;
$.each($("#mytable tbody tr"), function() {
if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
$(this).hide();
} else {
$(this).show();
}
});
});
});
JS;
$this->registerJs($script);

$this->title = 'My Yii Application';
?>

<div class="site-index">


    <div class="body-content">


        <? Pjax::begin(); ?>
        <?php $form=ActiveForm::begin(['id' => 'forsearch',]) ?>
        <div class="form-group">
        <?=Html::input('text','text','',['id' => 'text'] ); ?>
        </div>
        <?php ActiveForm::end(); ?>
        <?php Pjax::end(); ?>


        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-hover" id="mytable">
                <tr>
                    <th colspan="4">Книги</th>
                    <th>Рубрика</th>
                </tr>
                <tr>
                    <th>Наименование</th>
                    <th>Автор</th>
                    <th>Дата публикации</th>
                    <th>ISBN</th>
                    <th>Наименование рубрики</th>
                </tr>
                <tbody>
                <?php foreach ($books as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['author'] ?></td>
                        <td><?= $item['data'] ?></td>
                        <td><?= $item['ISBN'] ?></td>
                        <td><?= $item['rubrics_name'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



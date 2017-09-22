<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var \kit\models\Widget $model
 * @var integer $groupId
 * @var array $presets
 * @var bool $isNew
 */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'widget-group-form-add',
]);
?>

<?= $form->field($model, 'name')->input('text', ['placeholder' => 'Имя']) ?>

<?= $form->field($model, 'description')->textarea(['placeholder' => 'Описание']) ?>

<?= $form->field($model, 'status')->checkbox() ?>

<?= Html::submitButton($isNew ? 'Добавить' : 'Сохранить')?>

<?php ActiveForm::end();?>
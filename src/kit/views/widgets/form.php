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
    'id' => 'widget-form-add',
]);
?>

<?= $form->field($model, 'groupId')->hiddenInput(['value' => $groupId])->label(false) ?>

<?= $form->field($model, 'name')->input('text', ['placeholder' => 'Имя']) ?>

<?= $form->field($model, 'description')->textarea(['placeholder' => 'Описание']) ?>

<?= $form->field($model, 'presetId')->dropDownList($presets);?>

<?= $form->field($model, 'status')->checkbox() ?>

<?= Html::submitButton($isNew ? 'Добавить' : 'Сохранить')?>

<?php ActiveForm::end();?>
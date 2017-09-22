<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var \kit\models\TestWidgetForm $model
 * @var integer $groupId
 */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'widget-form-setting',
]);
?>

<?= $form->field($model, 'test')->input('text', ['placeholder' => 'Тест']) ?>

<?= Html::submitButton( 'Сохранить')?>

<?php ActiveForm::end();?>
<?php
/**
 * @var $model;
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="form">
    <div class="form__wrapper">
        <h1><?= $this->title ?></h1>
<?php $form = ActiveForm::begin([
    'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'label'],
        'inputOptions' => ['class' => 'input'],
        'errorOptions' => ['class' => 'error']
    ]
]) ?>

<div>
    <?= $form->field($model, 'title')->textInput() ?>
</div>
<div>
    <?= $form->field($model, 'description')->textarea() ?>
</div>
<?= Html::submitButton('Создать', ['class' => 'btn']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>

?>

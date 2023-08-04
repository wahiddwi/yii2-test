<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* author Wahid Dwi Saputra */
/** @var yii\web\View $this */
/** @var frontend\models\AddressBook $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="address-book-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
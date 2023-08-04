<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* author Wahid Dwi Saputra */
/** @var yii\web\View $this */
/** @var frontend\models\AddressBookSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="address-book-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
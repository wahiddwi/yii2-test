<?php

use yii\helpers\Html;

/* author Wahid Dwi Saputra */
/** @var yii\web\View $this */
/** @var frontend\models\AddressBook $model */

$this->title = 'Update Address Book: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Address Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
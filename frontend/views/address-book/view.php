<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* author Wahid Dwi Saputra */
/** @var yii\web\View $this */
/** @var frontend\models\AddressBook $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Address Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="address-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
        ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
                'id',
            'name',
            'email:email',
            'phone_number',
            'address:ntext',
    ],
    ]) ?>

</div>
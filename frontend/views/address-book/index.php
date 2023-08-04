<?php

use frontend\models\AddressBook;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* author Wahid Dwi Saputra */
/** @var yii\web\View $this */
/** @var frontend\models\AddressBookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Address Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Address Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

                    'id',
            'name',
            'email:email',
            'phone_number',
            'address:ntext',
        [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, AddressBook $model, $key, $index, $column) {
        return Url::toRoute([$action, 'id' => $model->id]);
        }
        ],
        ],
        ]); ?>
    
    
</div>
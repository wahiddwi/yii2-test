<?php

namespace frontend\models;

use Yii;

/**
* author Wahid Dwi Saputra
* This is the model class for table "address_book".
*
    * @property int $id
    * @property string $name
    * @property string $email
    * @property string $phone_number
    * @property string $address
*/
class AddressBook extends \yii\db\ActiveRecord
{
/**
* {@inheritdoc}
*/
public static function tableName()
{
return 'address_book';
}

/**
* {@inheritdoc}
*/
public function rules()
{
return [
            [['name', 'email', 'phone_number', 'address'], 'required'],
            [['address'], 'string'],
            [['name', 'email'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 16],
        ];
}

/**
* {@inheritdoc}
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'name' => 'Name',
    'email' => 'Email',
    'phone_number' => 'Phone Number',
    'address' => 'Address',
];
}
}
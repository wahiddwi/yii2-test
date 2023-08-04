<?php

namespace frontend\models;

use Yii;

/**
* author Wahid Dwi Saputra
* This is the model class for table "path_info".
*
    * @property int $id
    * @property string $access_time
    * @property string $user_ip
    * @property string $user_host
    * @property string|null $path_info
    * @property string|null $query_string
*/
class PathInfo extends \yii\db\ActiveRecord
{
/**
* {@inheritdoc}
*/
public static function tableName()
{
return 'path_info';
}

/**
* {@inheritdoc}
*/
public function rules()
{
return [
            [['access_time', 'user_ip', 'user_host'], 'required'],
            [['access_time'], 'safe'],
            [['user_ip'], 'string', 'max' => 20],
            [['user_host', 'path_info', 'query_string'], 'string', 'max' => 50],
        ];
}

/**
* {@inheritdoc}
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'access_time' => 'Access Time',
    'user_ip' => 'User Ip',
    'user_host' => 'User Host',
    'path_info' => 'Path Info',
    'query_string' => 'Query String',
];
}
}
<?php

namespace kit\models;

use yii\db\ActiveRecord;

/**
 * Class Preset
 * @package kit\models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $controller
 *
 */
class Preset extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%widgets}}';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'controller'], 'string']
        ];
    }

}
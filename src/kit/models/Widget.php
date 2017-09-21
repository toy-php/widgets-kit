<?php

namespace kit\models;

use yii\db\ActiveRecord;

/**
 * Class Widget
 * @package kit\models
 *
 * @property int $id
 * @property int $groupId
 * @property int $presetId
 * @property string $name
 * @property string $description
 *
 * @property Preset $preset
 *
 */
class Widget extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%widgets}}';
    }

    public function rules()
    {
        return [
            [['groupId', 'presetId'], 'integer'],
            [['name', 'description'], 'string']
        ];
    }

    public function getPreset()
    {
        return $this->hasOne(Preset::className(), ['id' => 'presetId']);
    }
}
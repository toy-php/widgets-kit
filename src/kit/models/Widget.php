<?php

namespace kit\models;

use kit\controllers\BaseWidgetController;
use yii\base\Exception;
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
 * @property bool $status
 *
 * @property Preset $preset
 *
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
            [['name', 'description'], 'string'],
            ['status', 'boolean'],
            [['groupId', 'presetId', 'name'], 'required'],
            [['groupId', 'name'], 'unique', 'targetAttribute' => ['groupId', 'name']]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreset()
    {
        return $this->hasOne(Preset::className(), ['id' => 'presetId']);
    }

}
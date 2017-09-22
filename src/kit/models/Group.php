<?php

namespace kit\models;

use yii\db\ActiveRecord;

/**
 * Class Group
 * @package kit\models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $status
 *
 * @property Widget[] $widgets
 */
class Group extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%widgets_groups}}';
    }

    public function rules()
    {
        return [
            ['status', 'boolean'],
            [['name', 'description'], 'string'],
            [['name'], 'required'],
            [['name'], 'unique']
        ];
    }

    public function getWidgets()
    {
        return $this->hasMany(Widget::className(), ['groupId' => 'id']);
    }

}
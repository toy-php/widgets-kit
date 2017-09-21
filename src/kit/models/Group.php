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
 *
 * @property Widget $widget
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
            [['name', 'description'], 'string']
        ];
    }

    public function getWidgets()
    {
        return $this->hasMany(Widget::className(), ['groupId' => 'id']);
    }

}
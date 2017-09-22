<?php

namespace kit\models;

use yii\db\ActiveRecord;

/**
 * Class Value
 * @package kit\widgets\models
 *
 * @property integer $id
 * @property integer $attributeId
 * @property integer $widgetId
 * @property string $value
 *
 */
class Value extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%widgets_values}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['attributeId', 'integer'],
            ['widgetId', 'integer'],
            ['value', 'string'],
        ];
    }

}
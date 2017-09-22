<?php

namespace kit\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Attribute
 * @package kit\widgets\models
 *
 * @property integer $id
 * @property string $name
 *
 * @property Value $value
 *
 */
class Attribute extends ActiveRecord
{
    /**
     * Идентификатор виджета к которой принадлежит атрибут
     * @var integer
     */
    public $widgetId;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%widgets_attributes}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'unique'],
            ['name', 'string'],
        ];
    }

    /**
     * Поиск атрибута по имени
     * @param $name
     * @return Attribute|null
     */
    static public function findByName($name): ?Attribute
    {
        /** @var Attribute $attribute */
        $attribute = static::findOne(['name' => $name]);
        return $attribute;
    }

    /**
     * Получить объект значения атрибута
     * @return ActiveQuery
     */
    public function getValue()
    {
        $value = $this->hasOne(Value::className(), ['attributeId' => 'id'])
            ->where(['widgetId' => $this->widgetId]);
        return $value;
    }

    /**
     * Получить объекты значений атрибута
     * @return Value[]
     */
    public function getValues(): array
    {
        return $this->hasOne(Value::className(), ['attributeId' => 'id'])
            ->where(['widgetId' => $this->widgetId])
            ->all();
    }

}
<?php

namespace kit\models;

class BaseModel extends Widget
{

    private $_dynamicAttributes = [];

    /**
     * @inheritdoc
     */
    public function __get($name)
    {
        if (in_array($name, $this->attributes())) {
            return parent::__get($name);
        }
        $attribute = $this->getDynamicAttribute($name);
        $value = $attribute->value->value;
        if (!empty($value)) {
            return $value;
        }
        return null;
    }

    /**
     * Получить все динамические атрибуты
     * @return Attribute[]
     */
    public function getDynamicAttributes(): array
    {
        if (empty($this->_dynamicAttributes)) {
            $attributes = $this->hasMany(Attribute::className(), ['id' => 'attributeId'])
                ->viaTable(Value::tableName(), ['widgetId' => 'id'])
                ->all();
            /** @var Attribute $attribute */
            foreach ($attributes as $attribute) {
                $attribute->widgetId = $this->id;
                $this->_dynamicAttributes[$attribute->name] = $attribute;
            }
        }
        return $this->_dynamicAttributes;
    }

    /**
     * Получить динамический атрибут
     * @param string $name
     * @return Attribute|null
     */
    public function getDynamicAttribute(string $name): ?Attribute
    {
        $dynamicAttributes = $this->getDynamicAttributes();
        return isset($dynamicAttributes[$name])
            ? $dynamicAttributes[$name]
            : null;
    }

    /**
     * Добавить динамический атрибут
     * @param string $name
     * @param string $value
     */
    public function addDynamicAttribute(string $name, string $value)
    {
        $event = $this->isNewRecord ? static::EVENT_AFTER_INSERT : static::EVENT_AFTER_UPDATE;

        $this->on($event, function () use ($name, $value) {

            /** @var Attribute $attribute */
            // поиск атрибута, если нет создается новый атрибут
            // необходимо чтобы не дублировать имена атрибутов
            $attribute = Attribute::findByName($name);
            if (empty($attribute)) {
                $attribute = new Attribute();
                $attribute->name = $name;
                $attribute->save();
            }

            $valueObject = new Value();
            $valueObject->attributeId = $attribute->id;
            $valueObject->widgetId = $this->id;
            $valueObject->value = $value;
            $valueObject->save();
        });
    }

}
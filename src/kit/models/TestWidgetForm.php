<?php

namespace kit\models;

use yii\base\Model;

class TestWidgetForm extends Model
{

    protected $widget;
    public $test;

    public function __construct(TestWidget $widget, array $config = [])
    {
        $this->widget = $widget;
        parent::__construct($config);
        $this->loadAttributes();
    }

    protected function loadAttributes()
    {
        $testAttribute = $this->widget->getDynamicAttribute('test');
        if(!empty($testAttribute)){
            $this->test = $testAttribute->value->value;
        }
    }

    public function rules()
    {
        return [
            ['test', 'string'],
            ['test', 'required'],
        ];
    }

    public function save()
    {
        $this->widget->setDynamicAttribute('test', $this->test);
        return $this->widget->save();
    }

}
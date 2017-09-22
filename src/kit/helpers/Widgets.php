<?php

namespace kit\helpers;

use kit\models\Group;
use kit\models\Widget;

class Widgets
{

    /**
     * Получить представление всех виджетов группы
     * @param string $name
     * @return string
     */
    static public function getGroupByName(string $name): string
    {
        $group = Group::findOne(['name' => $name]);
        $output = '';
        if(empty($group)){
            return $output;
        }
        /** @var Widget $widget */
        foreach ($group->widgets as $widget) {
            $output .= \Yii::$app->runAction($widget->preset->controller . '/index', [$widget->id]);
        }
        return $output;
    }

    /**
     * Получить представление виджета из группы
     * @param string $path
     * @return string
     */
    static public function getWidgetByPath(string $path): string
    {
        list($groupName, $widgetName) = explode('/', $path);
        $group = Group::findOne(['name' => $groupName]);
        $output = '';
        if(empty($group)){
            return $output;
        }

        $widget = Widget::findOne(['groupId' => $group->id, 'name' => $widgetName]);
        if(empty($widget)){
            return $output;
        }

        return  \Yii::$app->runAction($widget->preset->controller . '/index', [$widget->id]);
    }
}
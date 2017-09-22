<?php

namespace kit\controllers;

use yii\web\Controller;

abstract class BaseWidgetController extends Controller
{
    /**
     * Вывод виджета
     * @param int $widgetId
     * @return string
     */
    abstract public function actionIndex(int $widgetId): string;

    /**
     * Настройка виджета
     * @param int $widgetId
     */
    abstract public function actionSetting(int $widgetId);

    /**
     * Установка виджета
     */
    abstract public function install();

    /**
     * @inheritdoc
     */
    public function bindActionParams($action, $params)
    {
        return $params;
    }

}
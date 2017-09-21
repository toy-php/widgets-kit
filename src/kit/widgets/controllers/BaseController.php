<?php

namespace kit\widgets\controllers;

abstract class BaseController
{

    /**
     * Вывод виджета
     * @param int $widgetId
     * @return string
     */
    abstract public function index(int $widgetId): string;

    /**
     * Настройка виджета
     * @param int $widgetId
     * @return string
     */
    abstract public function setting(int $widgetId): string;

    /**
     * Рендеринг
     * @param string $view
     * @param array $params
     * @param array $context
     * @return string
     */
    public function render(string $view, array $params = [], array $context = []): string
    {
        return \Yii::$app->view->render($view, $params, $context);
    }
}
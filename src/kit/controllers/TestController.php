<?php

namespace kit\controllers;

use kit\models\TestWidget;
use yii\web\NotFoundHttpException;

class TestController extends BaseWidgetController
{

    /**
     * Вывод виджета
     * @param int $widgetId
     * @return string
     */
    public function actionIndex(int $widgetId): string
    {
        $widget = TestWidget::findOne(['id' => $widgetId]);
        return $this->renderPartial('index', ['model' => $widget]);
    }

    /**
     * Настройка виджета
     * @param int $widgetId
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionSetting(int $widgetId): string
    {
        $widget = TestWidget::findOne(['id' => $widgetId]);

        if(empty($widget)){
            throw new NotFoundHttpException();
        }
    }

    /**
     * Установка виджета
     */
    public function install()
    {
        /*
         * Тут проверяется наличие модели Preset по имени (оно должно быть уникально)
         * Если модели нет, то она создается и сохраняется
         */
    }
}
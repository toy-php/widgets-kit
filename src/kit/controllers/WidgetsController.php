<?php

namespace kit\controllers;

use kit\models\Preset;
use kit\models\Widget;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class WidgetsController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * Вывести список виджетов
     * @return string
     */
    public function actionList()
    {
        $groupId = \Yii::$app->request->get('groupId');
        $dataProvider = new ActiveDataProvider([
            'query' => Widget::find()->where(['groupId' => $groupId]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->renderAjax('list', [
            'dataProvider' => $dataProvider,
            'groupId' => $groupId
        ]);
    }

    public function actionSetting()
    {
        /**
         * todo вывод настроек виджета
         */
    }

    /**
     * Добавить виджет
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $groupId = \Yii::$app->request->get('groupId');
        $model = new Widget();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['/kit/widgets/list', 'groupId' => $groupId]);
        }

        $presetsObject = Preset::find()->all();

        $presets = [];
        /** @var Preset $item */
        foreach ($presetsObject as $item) {
            $presets[$item->id] = $item->name;
        }

        return $this->renderAjax('form', [
            'isNew' => true,
            'model' => $model,
            'groupId' => $groupId,
            'presets' => $presets
            ]);
    }

    /**
     * Редактировать виджет
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate()
    {
        $id = \Yii::$app->request->get('id');
        $groupId = \Yii::$app->request->get('groupId');
        $model = Widget::findOne(['id' => $id]);

        if (empty($model)){
            throw new NotFoundHttpException();
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['/kit/widgets/list', 'groupId' => $groupId]);
        }

        $presetsObject = Preset::find()->all();

        $presets = [];
        /** @var Preset $item */
        foreach ($presetsObject as $item) {
            $presets[$item->id] = $item->name;
        }

        return $this->renderAjax('form', [
            'isNew' => false,
            'model' => $model,
            'groupId' => $groupId,
            'presets' => $presets
        ]);
    }

    /**
     * Удалить виджет
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionRemove()
    {
        $id = \Yii::$app->request->get('id');
        $groupId = \Yii::$app->request->get('groupId');
        $model = Widget::findOne(['id' => $id]);

        if (empty($model)){
            throw new NotFoundHttpException();
        }

        $model->delete();
        return $this->redirect(['/kit/widgets/list', 'groupId' => $groupId]);
    }

}
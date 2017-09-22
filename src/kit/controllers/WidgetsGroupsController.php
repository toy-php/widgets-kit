<?php

namespace kit\controllers;

use kit\models\Group;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class WidgetsGroupsController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * Вывод списка групп виджетов
     * @return string
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Group::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->renderAjax('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Добавление новой группы виджетов
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Group();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['/kit/widgets-groups/list']);
        }

        return $this->renderAjax('form', [
            'isNew' => true,
            'model' => $model
        ]);
    }

    /**
     * Редактирование группы виджетов
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate()
    {
        $id = \Yii::$app->request->get('id');
        $model = Group::findOne(['id' => $id]);

        if (empty($model)){
            throw new NotFoundHttpException();
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['/kit/widgets-groups/list']);
        }

        return $this->renderAjax('form', [
            'isNew' => false,
            'model' => $model
        ]);
    }

    /**
     * Удалить группу виджетов
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionRemove()
    {
        $id = \Yii::$app->request->get('id');
        $model = Group::findOne(['id' => $id]);

        if (empty($model)){
            throw new NotFoundHttpException();
        }

        $model->delete();
        return $this->redirect(['/kit/widgets-groups/list']);
    }

}
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */
?>

    <div><?= Html::a('Добавить', ['/kit/widgets-groups/add']); ?></div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'columns' => [
        'id',
        'name',
        'description',
        [
            'class' => \yii\grid\DataColumn::className(),
            'header' => 'Статус',
            'value' => function ($data) {
                return !empty($data->status) ? 'Включен' : 'Выключен';
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'template' => '{widgets}{update}{remove}',
            'buttons' => [
                'widgets' => function ($url, $model, $key){
                    return Html::a('Виджеты', ['/kit/widgets/list', 'groupId' => $model->id]);
                },
                'update' => function ($url){
                    return Html::a('Редактировать', $url);
                },
                'remove' => function ($url){
                    return "<form action='$url' method='post'><input type='submit' value='Удалить'></form>";
                }
            ]
        ],
    ],
]); ?>
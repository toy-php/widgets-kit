<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var integer $groupId
 */
?>

    <div><?= Html::a('Добавить', ['/kit/widgets/add', 'groupId' => $groupId]); ?></div>

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
            'template' => '{update}{remove}',
            'buttons' => [
                'update' => function ($url) use ($groupId){
                    $url = \kit\helpers\Uri::forUrl($url)
                        ->withAddParams(['groupId' => $groupId]);
                    return Html::a('Редактировать', $url);
                },
                'remove' => function ($url) use ($groupId){
                    $url = \kit\helpers\Uri::forUrl($url)
                        ->withAddParams(['groupId' => $groupId]);

                    return "<form action='$url' method='post'><input type='submit' value='Удалить'></form>";
                }
            ]
        ],
    ],
]); ?>
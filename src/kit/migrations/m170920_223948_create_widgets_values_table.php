<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widgets_values`.
 */
class m170920_223948_create_widgets_values_table extends Migration
{

    public $tableName = '{{%widgets_values}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'widgetId' => $this->integer()->notNull(),
            'attributeId' => $this->integer()->notNull(),
            'value' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-widgets_values__widgets_widgetId',
            $this->tableName,
            'widgetId',
            'widgets',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-widgets_values__widgets_attributes_attributeId',
            $this->tableName,
            'attributeId',
            'widgets_attributes',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widgets_attributes`.
 */
class m170920_223945_create_widgets_attributes_table extends Migration
{

    public $tableName = '{{%widgets_attributes}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widgets`.
 */
class m170920_233520_create_presets_table extends Migration
{

    public $tableName = '{{%widgets}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'controller' =>$this->string()->notNull(),
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

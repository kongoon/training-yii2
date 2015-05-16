<?php

use yii\db\Schema;
use yii\db\Migration;

class m150516_063506_create_post_table extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id'=>  Schema::TYPE_PK,
            'title'=>  Schema::TYPE_STRING,
            'detail'=> Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('post');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}

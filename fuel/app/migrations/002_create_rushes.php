<?php

namespace Fuel\Migrations;

class Create_rushes
{
    public function up()
    {
        \DBUtil::create_table('rushes', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'title' => array('constraint' => 255, 'type' => 'varchar'),
            'picture' => array('constraint' => 255, 'type' => 'varchar'),
            'summary' => array('type' => 'text'),
            'picture' => array('type' => 'varchar', 'constraint' => 255),
            'body' => array('type' => 'text'),
            'user_id' => array('constraint' => 11, 'type' => 'int'),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }
    public function down()
    {
        \DBUtil::drop_table('rushes');
    }
}
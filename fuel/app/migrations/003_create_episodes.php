<?php

namespace Fuel\Migrations;

class Create_Episodes
{
    public function up()
    {
        \DBUtil::create_table('equipe', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'prenom' => array('constraint' => 255, 'type' => 'varchar'),
            'nom' => array('constraint' => 255, 'type' => 'varchar'),
            'age' =>  array('constraint' => 11, 'type' => 'int',  'unsigned' => true),
            'facebook' =>  array('constraint' => 255, 'type' => 'varchar'),
            'picture' =>  array('type' => 'text'),
            'biographie' => array('type' => 'text'),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }
    public function down()
    {
        \DBUtil::drop_table('equipe');
    }
}

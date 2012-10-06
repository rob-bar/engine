<?php

namespace Fuel\Migrations;

class Create_tourguides
{
	public function up()
	{
		\DBUtil::create_table('tourguides', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'rank' => array('constraint' => '"Normal","Elite","Freelance","High","Highest"', 'type' => 'enum'),
			'max_visitors' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tourguides');
	}
}
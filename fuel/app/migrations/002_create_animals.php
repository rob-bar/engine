<?php

namespace Fuel\Migrations;

class Create_animals
{
	public function up()
	{
		\DBUtil::create_table('animals', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'kind' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'specie_id' => array('constraint' => 11, 'type' => 'int'),
			'enclosure_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('animals');
	}
}
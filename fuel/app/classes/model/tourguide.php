<?php
use Orm\Model;

class Model_Tourguide extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'rank',
		'max_visitors',
		'created_at',
		'updated_at',
	);
	
	protected static $_has_many = array('visitors');
	
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('rank', 'Rank', 'required');
		$val->add_field('max_visitors', 'Max Visitors', 'required|valid_string[numeric]');
		return $val;
	}

}

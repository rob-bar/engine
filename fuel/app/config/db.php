<?php
/**
 * Base Database Config.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'active' => 'default',

	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'default' => array(
		'type'        => 'mysqli',
		'connection'     => array(
			'hostname'       => '127.0.0.1',
			'port'           => '3306',
			'database'       => 'thezoo',
			'username'       => 'root',
			'password'       => 'root',
			'persistent'     => false,
			'compress'			=> true
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'enable_cache' => true,
		'profiling'    => true,
	),

	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 6379,
			'timeout'	=> null,
		)
	),

);

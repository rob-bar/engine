<?php
return array(
  '_root_'  => 'default/index',
  '_404_'   => 'default/404',

  'channel' => 'default/channel',

  // ADMIN
  'admin' =>'admin/default/index',

  'admin/logout' =>'admin/default/logout',
  'admin/login' => 'admin/default/login',

  // BASE
  ':lang/(:alnum)' => 'default/index/$2',
  ':lang' => 'default/index',
);

<?php
return array(
	'_root_'  => 'news',  // The default route
	'_404_'   => 'welcome/404',    // The main 404

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
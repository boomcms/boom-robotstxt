<?php

Route::set('boom-sitemap', 'robots.txt')
	->defaults(array(
		'controller' => 'robots',
        'action' => 'view'
	));

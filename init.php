<?php

Route::set('boom-robotstxt', 'robots.txt')
    ->defaults(array(
        'controller' => 'robots',
        'action' => 'view'
    ));

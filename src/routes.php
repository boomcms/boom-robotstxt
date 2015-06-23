<?php

Route::get('robots.txt', 'BoomCMS\Robots\Controllers\Robots@view');

Route::group([
	'prefix' => 'cms',
	'namespace' => 'BoomCMS\Robots\Controllers\CMS',
	'middleware' => [
		'BoomCMS\Core\Http\Middleware\DisableHttpCacheIfLoggedIn',
		'BoomCMS\Core\Http\Middleware\DefineCMSViewSharedVariables',
		'BoomCMS\Core\Http\Middleware\RequireLogin'
	]
], function () {
	Route::controller('robots', 'Robots');
});

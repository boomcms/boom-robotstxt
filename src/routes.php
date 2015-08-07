<?php

Route::get('robots.txt', 'BoomCMS\Http\Controllers\Robots@view');

Route::group([
    'prefix'     => 'cms',
    'namespace'  => 'BoomCMS\Http\Controllers\CMS',
    'middleware' => [
        'BoomCMS\Http\Middleware\DisableHttpCacheIfLoggedIn',
        'BoomCMS\Http\Middleware\DefineCMSViewSharedVariables',
        'BoomCMS\Http\Middleware\RequireLogin',
    ],
], function () {
    Route::controller('robots', 'Robots');
});

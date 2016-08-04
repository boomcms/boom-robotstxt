<?php

Route::get('robots.txt', 'BoomCMS\Http\Controllers\Robots@view');

Route::group([
    'prefix'     => 'boomcms',
    'namespace'  => 'BoomCMS\Http\Controllers\CMS',
    'middleware' => [
        'web',
        BoomCMS\Http\Middleware\DefineCMSViewSharedVariables::class,
    ],
], function () {
    Route::controller('robots', 'Robots');
});

<?php

namespace BoomCMS\Http\Controllers\CMS;

use BoomCMS\Http\Controllers\Controller;
use BoomCMS\Robots\RobotsFile;
use Illuminate\Http\Request;

class Robots extends Controller
{
    protected $role = 'manageRobots';

    public function getIndex()
    {
        $file = new RobotsFile();

        return view('boomcms::robots.index', [
           'rules' => $file->getProductionRules(),
        ]);
    }

    public function postIndex(Request $request)
    {
        $file = new RobotsFile();
        $file->saveRules($request->input('rules'), auth()->user());
    }
}

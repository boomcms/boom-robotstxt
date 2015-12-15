<?php

namespace BoomCMS\Http\Controllers\CMS;

use BoomCMS\Core\Auth\Auth;
use BoomCMS\Http\Controllers\Controller;
use BoomCMS\Robots\RobotsFile;
use Illuminate\Http\Request;

class Robots extends Controller
{
    /**
     * @var RobotsFile
     */
    private $robotsFile;

    public function __construct(Auth $auth, Request $request)
    {
        $this->auth = $auth;
        $this->request = $request;
        $this->robotsFile = new RobotsFile();

        $this->authorization('manage_robots');
    }

    public function getIndex()
    {
        return view('boomcms::robots.index', [
           'rules' => $this->robotsFile->getProductionRules(),
        ]);
    }

    public function postIndex()
    {
        $this->robotsFile->saveRules($this->request->input('rules'), $this->auth->getPerson());
    }
}

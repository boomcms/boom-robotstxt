<?php

namespace BoomCMS\Robots\Controllers\CMS;

use BoomCMS\Robots\RobotsFile;
use BoomCMS\Core\Auth\Auth;
use BoomCMS\Core\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Robots extends Controller
{
    /**
     *
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

    public function index()
    {
        return View::make('boom:robots.index', [
           'rules' => $this->robotsFile->getProductionRules(),
        ]);
    }

    public function save()
    {
        $this->robotsFile->saveRules($this->request->input('rules'), $this->person);
    }
}
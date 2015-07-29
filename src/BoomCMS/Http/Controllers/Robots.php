<?php

namespace BoomCMS\Http\Controllers;

use BoomCMS\Robots\RobotsFile;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class Robots extends Controller
{
	public function view()
	{
		return (new Response())
			->header('Content-Type', 'text/plain')
			->setContent(new RobotsFile());
	}
}
<?php

class Controller_Robots extends Controller
{
	public function action_view()
	{
		// Set an content-type header.
		$this->response
			->headers('Content-Type', 'text/plain')
			->body(new Boom\RobotsFile());
	}
}
<?php

class Controller_Cms_Robots extends Controller_Cms
{
    /**
     *
     * @var Boom\RobotsFile
     */
    private $robotsFile;

    public function before()
    {
        parent::before();

        $this->authorization('manage_robots');

        $this->robotsFile = new Boom\RobotsFile();
    }

    public function action_index()
    {
        $this->template = new View('boom/robots/index', [
           'rules' => $this->robotsFile->getProductionRules(),
        ]);
    }

    public function action_save()
    {
        $this->robotsFile->saveRules($this->request->post('rules'), $this->person);
    }
}
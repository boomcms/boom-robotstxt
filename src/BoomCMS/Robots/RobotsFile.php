<?php

namespace BoomCMS\Robots;

use BoomCMS\Core\Person\Person;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class RobotsFile
{
    /**
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->render();
    }

    /**
     *
     * @return string
     */
    public function getDevelopmentRules()
    {
        return "User-agent: *\nDisallow: /";
    }

    /**
     *
     * @return string
     */
    public function getProductionRules()
    {
        $results = DB::table('robots')
			->select('rules')
			->orderBy('edited_at', 'desc')
			->first();

        return isset($results->rules) ? $results->rules : "";
    }

    /**
     *
     * @return string
     */
    public function render()
    {
        return (App::environment('production')) ?
			$this->getProductionRules()
			: $this->getDevelopmentRules();
    }

    /**
     *
     * @param string $rules
     * @param Person $person
     * @return RobotsFile
     */
    public function saveRules($rules, Person $person)
    {
		DB::table('robots')
			->insert([
				'rules' => trim(strip_tags($rules)),
				'edited_by' => $person->getId(),
				'edited_at' => time(),
			]);

        return $this;
    }
}
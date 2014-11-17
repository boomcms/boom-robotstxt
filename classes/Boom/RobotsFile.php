<?php

namespace Boom;

use DB;
use Boom\Person\Person;
use Boom\Boom;

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
        $results = DB::select('rules')
            ->from('robots')
            ->order_by('id', 'desc')
            ->limit(1)
            ->execute()
            ->as_array();

        return isset($results[0]) ? $results[0]['rules'] : "";
    }

    /**
     *
     * @return string
     */
    public function render()
    {
        if (Boom::instance()->getEnvironment()->isProduction()) {
            return $this->getProductionRules();
        } else {
            return $this->getDevelopmentRules();
        }
    }

    /**
     *
     * @param string $rules
     * @param Person $person
     * @return \Boom\RobotsFile
     */
    public function saveRules($rules, Person $person)
    {
        DB::insert('robots', array('rules', 'edited_by', 'edited_at'))
            ->values(array(
                trim(strip_tags($rules)),
                $person->getId(),
                time()
            ))
            ->execute();

        return $this;
    }
}
<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 2:26 PM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Specs\Team;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\IBusinessSpec;

class GoalDiff implements IBusinessSpec
{

    /**
     * @var Team
     */
    private $team;

    public function GoalDiff(Team $team)
    {
        $this->team = $team;
    }

    function apply()
    {
        return $this->team->getGoalsFor() - $this->team->getGoalsAgainst();
    }
}
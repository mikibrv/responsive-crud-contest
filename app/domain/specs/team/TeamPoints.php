<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 1:39 PM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Specs\Team;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\IBusinessSpec;

class TeamPoints implements IBusinessSpec
{
    /**
     * @var Team
     */
    private $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    function apply()
    {
        return $this->team->getWon() * 3 + $this->team->getDraw();
    }
}
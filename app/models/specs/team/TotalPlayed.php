<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 2:21 PM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Specs\Team;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\IBusinessSpec;

class TotalPlayed implements IBusinessSpec
{
    /**
     * @var Team
     */
    private $team;

    public function TotalPlayed(Team $team)
    {
        $this->team = $team;
    }

    function apply()
    {
        return $this->team->getWon() + $this->team->getDraw() + $this->team->getLost();
    }
}
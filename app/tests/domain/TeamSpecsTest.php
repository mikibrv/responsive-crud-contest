<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 5:23 PM
 * Contact: miki@softwareengineer.ro
 */

namespace Test\Domain;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\Team\TeamPoints;
use Test\TestCase;

class TeamSpecsTest extends TestCase
{

    public function testTeamPointsSpec()
    {
        $team = $this->createTeamObject();
        $spec = new TeamPoints($team);
        $this->assertEquals(31,$spec->apply());
    }

    /**
     * @return Team
     */
    private function createTeamObject()
    {
        $team = new Team();
        $team->setWon(10);
        $team->setLost(1);
        $team->setDraw(1);
        return $team;
    }

} 
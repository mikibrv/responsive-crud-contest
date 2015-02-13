<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 5:23 PM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Test\Domain;


use MikiBrv\Domain\Builders\TeamBuilder;
use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\Team\NameIsUnique;
use MikiBrv\Test\TestCase;

class TeamSpecsTest extends TestCase
{

    public function testIsNameUnique()
    {
        $spec = new NameIsUnique($this->getTeamRepository(), "a random unusual name");
        $this->assertTrue($spec->apply());
    }

    public function testTotalPlayed()
    {
        $team = $this->createTeamObject();
        $this->assertEquals(12, $team->getTotalPlayed());
    }

    public function testGoalsDiffSpec()
    {
        $team = $this->createTeamObject();
        $this->assertEquals(-8, $team->getGoalDiff());
    }

    public function testTeamPointsSpec()
    {
        $team = $this->createTeamObject();
        $this->assertEquals(31, $team->getPoints());
    }

    /**
     * @return Team
     */
    private function createTeamObject()
    {
        return TeamBuilder::create($this->getTeamRepository())
            ->name("Funky Town")
            ->addWon(10)
            ->addDraw(1)
            ->addLost(1)
            ->goalsAgainst(10)
            ->goalsFor(2)
            ->build();
    }

} 
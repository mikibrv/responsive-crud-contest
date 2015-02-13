<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 2:18 AM
 */

namespace Test\Repository;


use MikiBrv\Domain\Builders\TeamBuilder;
use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\Team\NameIsUnique;
use MikiBrv\Test\TestCase;

class TeamRepositoryTest extends TestCase
{

    public function testRepoCreation()
    {
        $this->assertNotNull($this->getTeamRepository());
    }

    public function testTeamRepoOperations()
    {
        $repository = $this->getTeamRepository();

        $this->createTeam();

        $wasNameTaken = new NameIsUnique($repository, "Test Shiny Stars");
        $this->assertFalse($wasNameTaken->apply());
        $teamList = $repository->all(0, 1, array("name" => "Test Shiny Stars")); // we should have it
        $this->assertEquals(1, sizeof($teamList));
        /**
         * /** @var Team $team
         */
        $team = $teamList[0];
        $this->assertNotNull($team->getId()); //we should update the name;

        $team->setName("Test Was Shiny Stars");
        $repository->update($team);
        $this->assertTrue($wasNameTaken->apply()); //now this should be fine, since we changed the name

        //let's get rid of this
        $rememberId = $team->getId();
        $repository->delete($team);
        $this->assertNull($repository->find($rememberId));
    }

    /**
     * @return Team
     */
    public function createTeam()
    {
        return $this->getTeamRepository()->create(
            TeamBuilder::create($this->getTeamRepository())
                ->name("Test Shiny Stars")
                ->lastPlayed(new \DateTime('now'))
                ->addWon(1)
                ->addLost(1)
                ->addDraw(1)
                ->goalsAgainst(10)
                ->goalsFor(11)
                ->build()
        );
    }


    public function testRetrieveTeamsOrderedByRank()
    {
        $teamsOrdered = $this->getTeamRepository()->retrieveTeamsOrderedByRank(0, 100);
        $this->assertNotNull($teamsOrdered);
    }
} 
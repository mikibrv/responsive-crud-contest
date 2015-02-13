<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 11:25 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Test\Mock;


use MikiBrv\Commands\TeamCommand;
use MikiBrv\Domain\Specs\Team\Exceptions\InvalidTeamException;
use MikiBrv\Test\TestCase;
use MikiBrv\Utils\TeamNameGenerator;

class MockDatabase extends TestCase
{


    public function testMockDatabase1K()
    {

        for ($i = 0; $i < 1000; $i++) {
            $cmd = new TeamCommand();
            $cmd->name = TeamNameGenerator::generate();
            $cmd->location = TeamNameGenerator::generateLocation();

            $cmd->won = rand(0, 10);
            $cmd->lost = rand(0, 10);
            $cmd->draw = rand(0, 10);

            $cmd->goalsAgainst = rand(0, 20);
            $cmd->goalsFor = rand(0, 20);

            try {
                $this->getTeamService()->registerTeam($cmd);
            } catch (InvalidTeamException $e) {
                $i--; //just to prevent, maybe the random will generate duplicates;
            }
        }

    }

}
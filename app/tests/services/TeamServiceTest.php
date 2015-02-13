<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:23 AM
 */

namespace MikiBrv\Test\Services;


use MikiBrv\Commands\TeamCommand;
use MikiBrv\Test\TestCase;

class TeamServiceTest extends TestCase
{

    public function testRegisterTeam()
    {
        $command = new TeamCommand();
        $command->name = "Test Chaps";
        $command->draw = 0;
        $command->lost = 1;
        $command->won = 3;
        $command->goalsAgainst = 3;
        $command->goalsFor = 10;


        $team = $this->getTeamService()->registerTeam($command);
        $command->id = $team->getId();
        $this->getTeamService()->removeTeam($command);
    }

    public function testRecomputeRanks()
    {
        $this->getTeamService()->recomputeRanks();
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:23 AM
 */

namespace MikiBrv\Test\services;


use MikiBrv\Commands\TeamCommand;
use MikiBrv\Test\TestCase;

class TeamServiceTest extends TestCase
{

    public function testRegisterTeam()
    {
        $command = new TeamCommand();
        $command->name = "Loud Chaps";
        $command->draw = 0;
        $command->lost = 1;
        $command->won = 3;
        $command->goalsAgainst = 3;
        $command->goalsFor = 10;


        $this->getTeamService()->registerTeam($command);
    }
} 
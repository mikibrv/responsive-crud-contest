<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:04 AM
 */

namespace MikiBrv\Services;

use DateTime;
use MikiBrv\Commands\TeamCommand;
use MikiBrv\Domain\Builders\TeamBuilder;

interface ITeamService
{

    public function registerTeam(TeamCommand $command);

}

class TeamService extends AbstractService implements ITeamService
{

    public function registerTeam(TeamCommand $command)
    {

        //convert the date time please
        $lastPlayed = new DateTime("now"); //$command->lastPlayed;

        //we have to check some stuff..
        $team = TeamBuilder::create($this->teamRepository)
            ->name($command->name)
            ->addWon($command->won)
            ->addDraw($command->draw)
            ->addLost($command->lost)
            ->lastPlayed($lastPlayed)
            ->goalsAgainst($command->goalsAgainst)
            ->goalsFor($command->goalsFor)
            ->build();

        $this->teamRepository->create($team);

    }
}
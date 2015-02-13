<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:04 AM
 */

namespace MikiBrv\Services;

use DateTime;
use Doctrine\ORM\EntityNotFoundException;
use Event;
use MikiBrv\Commands\TeamCommand;
use MikiBrv\Commands\TeamSearchCommand;
use MikiBrv\Domain\Builders\TeamBuilder;
use MikiBrv\Domain\Events\RankChangedListener;
use MikiBrv\Domain\Models\Team;

interface ITeamService
{

    /**
     * @param TeamCommand $command
     * @return Team
     */
    public function registerTeam(TeamCommand $command);

    /**
     * @return mixed
     */
    public function recomputeRanks();

    /**
     * @param TeamCommand $command
     * @return mixed
     */
    public function removeTeam(TeamCommand $command);

    /**
     * @param TeamSearchCommand $teamSearchCommand
     * @return array
     */
    public function fetch(TeamSearchCommand $teamSearchCommand);

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
            ->location($command->location)
            ->addWon($command->won)
            ->addDraw($command->draw)
            ->addLost($command->lost)
            ->lastPlayed($lastPlayed)
            ->goalsAgainst($command->goalsAgainst)
            ->goalsFor($command->goalsFor)
            ->build();

        $this->teamRepository->create($team);
        //now let's return this new team we added
        Event::fire(RankChangedListener::getName(), null);
        return $team;
    }

    /**
     * @return mixed
     */
    public function recomputeRanks()
    {
        $teamSeries = $this->teamRepository->retrieveTeamsOrderedByRank(0, 1200); // i am sure he can handle 1.2k
        $rank = 1;
        $teamsToUpdate = array();
        foreach ($teamSeries as $team) {
            if ($team->getRank() != $rank) {
                $team->setRank($rank);
                array_push($teamsToUpdate, $team);
            }
            $rank++;
        }
        $this->teamRepository->bulkUpdate($teamsToUpdate);
    }

    /**
     * @param TeamCommand $command
     * @return mixed
     */
    public function removeTeam(TeamCommand $command)
    {
        $team = $this->teamRepository->find($command->id);
        if ($team != null) {
            $this->teamRepository->delete($team);
        } else {
            //maybe a throw entitynotfound
        }
    }

    /**
     * @param TeamSearchCommand $teamSearchCommand
     * @return array
     */
    public function fetch(TeamSearchCommand $teamSearchCommand)
    {
        return array();
    }
}
<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 9:43 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Specs\Team;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\IBusinessSpec;

class TeamRank implements IBusinessSpec
{

    /**
     * @var Team
     */
    private $teamOne;
    /**
     * @var Team
     */
    private $teamTwo;

    public function __constructor(Team $teamOne, Team $teamTwo)
    {
        $this->teamOne = $teamOne;
        $this->teamTwo = $teamTwo;
    }

    /**
     * Returns the team with the higher rank
     * @return Team
     */
    function apply()
    {
        /**
         * If Score higher
         */
        if ($this->teamOne->getPoints() > $this->teamTwo->getPoints()) {
            return $this->teamOne;
        } else if ($this->teamTwo->getPoints() > $this->teamOne->getPoints()) {
            return $this->teamTwo;
        }

        /**
         * If more goals scored
         */
        if ($this->teamOne->getGoalDiff() > $this->teamTwo->getGoalDiff()) {
            return $this->teamOne;
        } else if ($this->teamTwo->getGoalDiff() > $this->teamOne->getGoalDiff()) {
            return $this->teamTwo;
        }

        /**
         * If more games played
         */
        if ($this->teamOne->getTotalPlayed() > $this->teamTwo->getTotalPlayed()) {
            return $this->teamOne;
        } else {
            return $this->teamTwo;
        }
    }
}
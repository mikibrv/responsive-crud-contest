<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 10:20 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use MikiBrv\Domain\Specs\Team\GoalDiff;
use MikiBrv\Domain\Specs\Team\TeamPoints;
use MikiBrv\Domain\Specs\Team\TotalPlayed;
use Mitch\LaravelDoctrine\Traits\SoftDeletes;

use Mitch\LaravelDoctrine\Traits\Timestamps;
use MikiBrv\Entities\EntityTraits\EntityID;
use MikiBrv\Entities\EntityTraits\JSerialize;

/**
 * @ORM\Entity
 * @ORM\Table(name="teams", options={"collate"="utf8_general_ci", "charset"="utf8"})
 * @ORM\HasLifecycleCallbacks()
 */
class Team extends AbstractModel
{

    use EntityID;
    use JSerialize;
    use Timestamps;
    use SoftDeletes;

    private $rank;
    /**
     * @ORM\Column(type="string",  nullable=false)
     */
    private $name;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastPlayed;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $won;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $draw;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $lost;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $goalsFor;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $goalsAgainst;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $points;

    private $goalsDiff = null;

    private $totalPlayed = null;

    /**
     * @param mixed $draw
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;
    }

    /**
     * @return mixed
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @param mixed $goalsAgainst
     */
    public function setGoalsAgainst($goalsAgainst)
    {
        $this->goalsAgainst = $goalsAgainst;
    }

    /**
     * @return mixed
     */
    public function getGoalsAgainst()
    {
        return $this->goalsAgainst;
    }

    /**
     * @return null
     */
    public function getGoalsDiff()
    {
        if ($this->goalsDiff == null) {
            $this->setGoalsDiff();
        }
        return $this->goalsDiff;
    }

    /**
     * @param mixed $goalsFor
     */
    public function setGoalsFor($goalsFor)
    {
        $this->goalsFor = $goalsFor;
    }

    /**
     * @return mixed
     */
    public function getGoalsFor()
    {
        return $this->goalsFor;
    }

    /**
     * @param mixed $lastPlayed
     */
    public function setLastPlayed($lastPlayed)
    {
        $this->lastPlayed = $lastPlayed;
    }

    /**
     * @return mixed
     */
    public function getLastPlayed()
    {
        return $this->lastPlayed;
    }

    /**
     * @param mixed $lost
     */
    public function setLost($lost)
    {
        $this->lost = $lost;
    }

    /**
     * @return mixed
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setPoints()
    {
        $spec = new TeamPoints($this);
        $this->points = $spec->apply();
    }

    public function getPoints()
    {
        if ($this->points == null) {
            $this->setPoints();
        }
        return $this->points;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    public function setGoalsDiff()
    {
        $spec = new GoalDiff($this);
        $this->goalsDiff = $spec->apply();
    }


    public function setTotalPlayed()
    {
        $spec = new TotalPlayed($this);
        $this->totalPlayed = $spec->apply();
    }


    /**
     * @return null
     */
    public function getTotalPlayed()
    {
        if ($this->totalPlayed == null) {
            $this->setTotalPlayed();
        }
        return $this->totalPlayed;
    }

    /**
     * @param mixed $won
     */
    public function setWon($won)
    {
        $this->won = $won;
    }

    /**
     * @return mixed
     */
    public function getWon()
    {
        return $this->won;
    }


}
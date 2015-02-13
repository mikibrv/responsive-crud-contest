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

    private $rank;
    /**
     * @ORM\Column(type="string",  nullable=false, unique=true)
     */
    private $name;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastPlayed;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $won = 0;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $draw = 0;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $lost = 0;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $goalsFor = 0;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $goalsAgainst = 0;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $points = 0;

    /**
     * @param mixed $draw
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;
        $this->setPoints();
    }

    /**
     * @return mixed
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @return int
     */
    public function getGoalDiff()
    {
        $spec = new GoalDiff($this);
        return $spec->apply();
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
     */
    private function setPoints()
    {
        $spec = new TeamPoints($this);
        $this->points = $spec->apply();
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        $spec = new TeamPoints($this);
        return $spec->apply();
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


    /**
     * @return mixed
     */
    public function getTotalPlayed()
    {
        $spec = new TotalPlayed($this);
        return $spec->apply();
    }

    /**
     * @param mixed $won
     */
    public function setWon($won)
    {
        $this->won = $won;
        $this->setPoints();
    }

    /**
     * @return mixed
     */
    public function getWon()
    {
        return $this->won;
    }


}
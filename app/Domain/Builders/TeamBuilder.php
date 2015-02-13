<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 12:16 AM
 */

namespace MikiBrv\Domain\Builders;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Domain\Specs\Team\InvalidTeamException;
use Validator;

class TeamBuilder implements IBuilder
{

    /**
     * @var Team
     */
    private $team;

    private function __construct()
    {
        $this->team = new Team();
    }

    /**
     * @return TeamBuilder
     */
    public static function create()
    {
        return new TeamBuilder();
    }

    public function validate()
    {
        $validator = Validator::make(
            array(
                'won' => $this->team->getWon(),
                'lost' => $this->team->getLost(),
                'draw' => $this->team->getDraw()
            ),
            array(
                'won' => array('required', 'min:0'),
                'lost' => array('required', 'min:0'),
                'draw' => array('required', 'min:0')
            )
        );
        if ($validator->fails()) {
            throw new InvalidTeamException();
        }
    }

    public function build()
    {
        $this->validate();
        return $this->team;
    }

    /**
     * @param $won
     * @return $this
     */
    public function addWon($won)
    {
        $this->team->setWon($won);
        return $this;
    }

    /**
     * @param $draw
     * @return $this
     */
    public function addDraw($draw)
    {
        $this->team->setDraw($draw);
        return $this;
    }


    /**
     * @param $lost
     * @return $this
     */
    public function addLost($lost)
    {
        $this->team->setLost($lost);
        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function name($name)
    {
        $this->team->setName($name);
        return $this;
    }

    /**
     * @param $goalsFor
     * @return $this
     */
    public function goalsFor($goalsFor)
    {
        $this->team->setGoalsFor($goalsFor);
        return $this;
    }


    /**
     * @param $goalsAgainst
     * @return $this
     */
    public function goalsAgainst($goalsAgainst)
    {
        $this->team->setGoalsAgainst($goalsAgainst);
        return $this;
    }
}
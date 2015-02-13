<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 2:33 AM
 */

namespace MikiBrv\Domain\Specs\Team;


use MikiBrv\Domain\Specs\IBusinessSpec;
use MikiBrv\Repositories\ITeamRepository;

class NameIsUnique implements IBusinessSpec
{

    private $teamRepository;
    private $name;

    public function __construct(ITeamRepository $teamRepository, $name)
    {
        $this->teamRepository = $teamRepository;
        $this->name = $name;
    }

    function apply()
    {
        $teamsList = $this->teamRepository->all(0, 100, array("name" => $this->name));

        if (count($teamsList) > 0) {
            return false;
        }
        return true;
    }
}
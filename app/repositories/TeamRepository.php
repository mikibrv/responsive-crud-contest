<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 2:14 AM
 */

namespace MikiBrv\Repositories;


use MikiBrv\Repositories\Common\AbstractRepository;
use MikiBrv\Repositories\Common\IRepository;

interface ITeamRepository extends IRepository
{

}

class TeamRepository extends AbstractRepository implements ITeamRepository
{

    private $entity = "MikiBrv\Domain\Models\Team";

    protected function getEntity()
    {
        return $this->entity;
    }


    
}
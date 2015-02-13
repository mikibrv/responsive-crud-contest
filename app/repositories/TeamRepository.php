<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 2:14 AM
 */

namespace MikiBrv\Repositories;


use MikiBrv\Domain\Models\Team;
use MikiBrv\Repositories\Common\AbstractRepository;
use MikiBrv\Repositories\Common\IRepository;

interface ITeamRepository extends IRepository
{

    /**
     * @param $name
     * @return Team
     */
    public function findByName($name);

    /**
     * @param $lowerLimit
     * @param $upperLimit
     * @return Team[]
     */
    public function retrieveTeamsOrderedByRank($lowerLimit, $upperLimit);
}

class TeamRepository extends AbstractRepository implements ITeamRepository
{

    private $entity = "MikiBrv\Domain\Models\Team";

    protected function getEntity()
    {
        return $this->entity;
    }


    /**
     * @param $name
     * @return Team
     */
    public function findByName($name)
    {
        return $this->entityManager->getRepository($this->getEntity())->findOneBy(array("name" => $name));
    }

    /**
     * select * from teams order by points desc, goalsFor - goalsAgainst desc, won+draw+lost desc
     * @param $lowerLimit
     * @param $upperLimit
     * @return Team[]
     */
    public function retrieveTeamsOrderedByRank($lowerLimit, $upperLimit)
    {
        $em = $this->entityManager;
        $qb = $em->createQueryBuilder();

        $qb->select(array('t'))
            ->from($this->entity, "t")
            ->orderBy("t.points", "desc")
            ->addOrderBy("t.goalsFor - t.goalsAgainst", "desc")
            ->addOrderBy("t.won+t.draw+t.lost", "desc");

        $query = $qb->getQuery();
        return $query->getResult();
    }
}
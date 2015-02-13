<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 11:10 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Events;


use MikiBrv\Domain\Models\Team;

class TeamPointsIntegrityListener extends AbstractEvent implements IEventListener
{

    /**
     * @param Team $data
     */
    public function handle($data)
    {
        $this->teamRepository->update($data);
    }

    public static function getName()
    {
        return "team.points.data.integrity.violation";
    }
}
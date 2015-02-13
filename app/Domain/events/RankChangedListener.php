<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 9:36 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Events;


use App;
use MikiBrv\Services\ITeamService;

class RankChangedListener extends AbstractEvent implements IEventListener
{

    public function handle($data)
    {
        $this->teamService->recomputeRanks();
    }

    public static function getName()
    {
        return "update.rank";
    }
}
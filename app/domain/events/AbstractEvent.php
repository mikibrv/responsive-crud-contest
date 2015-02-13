<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 11:05 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Events;


use App;
use MikiBrv\Repositories\ITeamRepository;
use MikiBrv\Services\ITeamService;

abstract class AbstractEvent
{
    /**
     * @var ITeamService
     */
    protected $teamService;
    /**
     * @var ITeamRepository
     */
    protected $teamRepository;

    public function __construct()
    {
        $this->teamService = App::make("MikiBrv\Services\ITeamService");
        $this->teamRepository = App::make("MikiBrv\Repositories\ITeamRepository");
    }

} 
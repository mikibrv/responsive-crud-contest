<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 1:13 PM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Controllers;


use MikiBrv\Services\ITeamService;

class BaseController
{
    /**
     * @var \MikiBrv\Services\ITeamService
     */
    protected $teamService;

    public function __construct(ITeamService $teamService)
    {
        $this->teamService = $teamService;

    }

} 
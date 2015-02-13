<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:07 AM
 */

namespace MikiBrv\Services;


use App;
use MikiBrv\Repositories\ITeamRepository;

class AbstractService
{

    /**
     * @var ITeamRepository
     */
    protected $teamRepository;

    function __construct()
    {
        $this->teamRepository = App::make("MikiBrv\Repositories\ITeamRepository");
    }


}
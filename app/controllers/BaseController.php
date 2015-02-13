<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 1:13 PM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Controllers;


use Controller;
use MikiBrv\Services\ITeamService;
use View;

class BaseController extends Controller
{
    /**
     * @var \MikiBrv\Services\ITeamService
     */
    protected $teamService;

    public function __construct(ITeamService $teamService)
    {
        $this->teamService = $teamService;

    }

    /**
     * @param $view
     * @param $model
     * @return $this
     */
    protected function renderView($view, $model)
    {
        return View::make("layouts/main")->with($model)
            ->nest("content", $view, $model);
    }

} 
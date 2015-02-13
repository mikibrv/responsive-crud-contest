<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:03 AM
 */

namespace MikiBrv\Providers;


use Illuminate\Support\ServiceProvider;
use MikiBrv\Services\TeamService;

class TeamServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("MikiBrv\Services\ITeamService", function () {
            return new TeamService();
        });
    }
}
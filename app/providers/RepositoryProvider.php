<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 2:20 AM
 */

namespace MikiBrv\Providers;


use Illuminate\Support\ServiceProvider;
use MikiBrv\Repositories\TeamRepository;

class RepositoryProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MikiBrv\Repositories\ITeamRepository', function () {
            return new TeamRepository();
        });
    }
}
<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 9:56 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Providers;


use Event;
use Illuminate\Support\ServiceProvider;
use MikiBrv\Domain\Events\RankChangedListener;
use MikiBrv\Domain\Events\TeamPointsIntegrityListener;

class EventProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Event::listen(RankChangedListener::getName(), "MikiBrv\Domain\Events\RankChangedListener@handle");
        Event::listen(TeamPointsIntegrityListener::getName(), "MikiBrv\Domain\Events\TeamPointsIntegrityListener@handle");
    }
}
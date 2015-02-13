<?php
namespace MikiBrv\Test;

use App;
use MikiBrv\Repositories\ITeamRepository;
use MikiBrv\Services\ITeamService;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../bootstrap/start.php';
    }

    /**
     * @return ITeamRepository
     */
    protected function getTeamRepository()
    {
        /**
         * get repositories from IoC.
         */
        return App::make("MikiBrv\Repositories\ITeamRepository");
    }

    /**
     * @return ITeamService
     */
    protected function getTeamService()
    {
        return App::make("MikiBrv\Services\ITeamService");
    }

}

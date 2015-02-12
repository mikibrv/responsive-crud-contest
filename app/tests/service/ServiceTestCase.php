<?php
/**
 * User: mcsere
 * Date: 9/1/14
 * Time: 5:48 PM
 * Contact: miki@softwareengineer.ro
 */

namespace test\service;


use App;

class ServiceTestCase extends \Illuminate\Foundation\Testing\TestCase
{


    protected function setUPServices()
    {
       // $this->pageService = App::make("Transp\Service\PageService");
    }

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../../bootstrap/start.php';
    }

} 
<?php
namespace Test;

use App;
class TestCase extends \Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

    protected  function setUPRepositories(){
        /**
         * get repositories from IoC.
         */
       // $this->langRepository = App::make("Transp\Repositories\Structure\ILangRepository");
    }

}

<?php

namespace Combindma\Sendinblue\Tests;

use Combindma\Sendinblue\Sendinblue;
use Combindma\Sendinblue\SendinblueServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public Sendinblue $sendinblue;

    protected function getPackageProviders($app): array
    {
        return [
            SendinblueServiceProvider::class,
        ];
    }

     public function getEnvironmentSetUp($app)
     {
         $app['config']->set('sendinblue.apiKey', 'sendinblue-api-key');
         $app['config']->set('sendinblue.defaultListIds', [1]);
         $app['config']->set('sendinblue.api_enabled', true);
         $this->sendinblue = new Sendinblue();
     }
}

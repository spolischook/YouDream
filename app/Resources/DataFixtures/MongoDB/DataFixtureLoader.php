<?php

use Hautelook\AliceBundle\Alice\DataFixtureLoader as BaseLoader;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class DataFixtureLoader extends BaseLoader
{
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/data/user.yml',
            __DIR__ . '/data/dream.yml',
        );
    }

    public function getImagesDir()
    {
        return __DIR__ . '/data/images/';
    }
}
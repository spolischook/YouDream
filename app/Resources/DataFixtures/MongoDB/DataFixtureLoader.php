<?php

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Hautelook\AliceBundle\Alice\DataFixtureLoader as BaseLoader;
use Nelmio\Alice\Fixtures;
use GeekHub\MediaBundle\Document\EmbeddedImage;

class DataFixtureLoader extends BaseLoader implements ContainerAwareInterface
{
    /** @var ContainerInterface */
    protected $container;

    /** {@inheritDoc} */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

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

    public function setImage($originalName)
    {
        $path = __DIR__ . '/data/images/';
        $targetFile = $this->getUploadPath() . $originalName;
        $this->container->get('filesystem')->copy($path.$originalName, $targetFile);


        $img = new EmbeddedImage();
        $img->setPath($this->getRootUploadPath() . $originalName);

        return $img;
    }

    public function getUploadPath()
    {
        return __DIR__ . '/../../../../web' . $this->getRootUploadPath();
    }

    public function getRootUploadPath()
    {
        return '/uploads/';
    }

    public function setRandomDreamImage()
    {
        return $this->setImage(rand(1,10).'.jpg');
    }
}
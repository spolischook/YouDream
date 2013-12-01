<?php

namespace GeekHub\MediaBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\HttpFoundation\File\File,
    Symfony\Component\HttpFoundation\File\UploadedFile;

/** @MongoDB\EmbeddedDocument */
class EmbeddedImage
{
//    public function __construct($path, $checkPath = true)
//    {
//        parent::__construct($path, true);
//
//        $this->filename = $this->getName($path);
//    }

    /** @MongoDB\String */
    protected $path;

    /** @MongoDB\String */
    protected $filename;

    /** @MongoDB\String */
    protected $mimeType;

    /** @MongoDB\Date */
    protected $uploadDate;

    protected $file;

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

//    public function move($directory, $name = null)
//    {
//        $target = parent::move($directory, $name = null);
//        $this->path = $target;
//
//        return $target;
//    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        $this->path = $this->getFile()->getClientOriginalName();

        $this->file = null;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }
}
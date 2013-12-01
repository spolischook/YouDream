<?php

namespace GeekHub\DreamBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Serializer\Annotation\ExclusionPolicy;

/** @MongoDB\Document(collection="dream") */
class Dream
{
    /** @MongoDB\Id */
    protected $id;

    /** @MongoDB\String */
    protected $title;

    /** @MongoDB\String */
    protected $slug;

    /** @MongoDB\String */
    protected $description;

    /** @MongoDB\ReferenceOne(targetDocument="GeekHub\UserBundle\Document\User") */
    protected $owner;

    /** @MongoDB\EmbedOne(targetDocument="GeekHub\MediaBundle\Document\EmbeddedImage") */
    protected $mainImage;

    protected $images;

    /** @MongoDB\String */
    protected $phone;

    /** @MongoDB\String */
    protected $phoneAvailable;

    /** @MongoDB\String */
    protected $state;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set owner
     *
     * @param \GeekHub\UserBundle\Document\User $owner
     * @return self
     */
    public function setOwner(\GeekHub\UserBundle\Document\User $owner)
    {
        $this->owner = $owner;
        $owner->addDream($this);
        return $this;
    }

    /**
     * Get owner
     *
     * @return \GeekHub\UserBundle\Document\User $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set mainImage
     *
     * @param file $mainImage
     * @return self
     */
    public function setMainImage($mainImage)
    {
        $this->mainImage = $mainImage;
        return $this;
    }

    /**
     * Get mainImage
     *
     * @return file $mainImage
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phoneAvailable
     *
     * @param string $phoneAvailable
     * @return self
     */
    public function setPhoneAvailable($phoneAvailable)
    {
        $this->phoneAvailable = $phoneAvailable;
        return $this;
    }

    /**
     * Get phoneAvailable
     *
     * @return string $phoneAvailable
     */
    public function getPhoneAvailable()
    {
        return $this->phoneAvailable;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Get state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }
}

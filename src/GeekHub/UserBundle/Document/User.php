<?php

namespace GeekHub\UserBundle\Document;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="users") */
class User extends BaseUser
{
    /** @MongoDB\Id */
    protected $id;

    /** @MongoDB\String */
    protected $name;

    /** @MongoDB\String */
    protected $aboutMe;

    /** @MongoDB\String */
    protected $firstName;

    /** @MongoDB\String */
    protected $lastName;

    /** @MongoDB\String */
    protected $gender;

    /** @MongoDB\File */
    protected $profilePicture;

    /** @MongoDB\String */
    protected $contacts;

    /** @MongoDB\Date */
    protected $birthday;

    /** @MongoDB\ReferenceMany(targetDocument="GeekHub\DreamBundle\Document\Dream") */
    protected $dreams;

    public function __construct()
    {
        $this->dreams = new ArrayCollection();
        parent::__construct();
    }

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
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set aboutMe
     *
     * @param string $aboutMe
     * @return self
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;
        return $this;
    }

    /**
     * Get aboutMe
     *
     * @return string $aboutMe
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Get gender
     *
     * @return string $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set profilePicture
     *
     * @param file $profilePicture
     * @return self
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
        return $this;
    }

    /**
     * Get profilePicture
     *
     * @return file $profilePicture
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * Set contacts
     *
     * @param string $contacts
     * @return self
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * Get contacts
     *
     * @return string $contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set birthday
     *
     * @param date $birthday
     * @return self
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * Get birthday
     *
     * @return date $birthday
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Add dream
     *
     * @param \GeekHub\DreamBundle\Document\Dream $dream
     */
    public function addDream(\GeekHub\DreamBundle\Document\Dream $dream)
    {
        $this->dreams->add($dream);
    }

    /**
     * Remove dream
     *
     * @param \GeekHub\DreamBundle\Document\Dream $dream
     */
    public function removeDream(\GeekHub\DreamBundle\Document\Dream $dream)
    {
        $this->dreams->removeElement($dream);
    }

    /**
     * Get dreams
     *
     * @return \Doctrine\Common\Collections\Collection $dreams
     */
    public function getDreams()
    {
        return $this->dreams;
    }
}

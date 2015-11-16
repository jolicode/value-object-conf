<?php

namespace Model\Nullable;

/** @Entity */
class User
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @Column(length=140)
     */
    private $name;

    /**
     * @var boolean
     *
     * @Column(type="boolean")
     */
    private $hasFavoriteCapsuleType = false;

    /**
     * The real Embedded stuff. It's ok but can't be "null"
     * Also, invalid state can came from the database as Doctrine does use the constructor.
     *
     * @var CapsuleType
     *
     * @Embedded(class="CapsuleType")
     */
    private $favoriteCapsuleType;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return CapsuleType|null
     */
    public function getFavoriteCapsuleType()
    {
        return $this->hasFavoriteCapsuleType() ? $this->favoriteCapsuleType : null;
    }

    /**
     * @param CapsuleType|null $favoriteCapsuleType
     */
    public function setFavoriteCapsuleType(CapsuleType $favoriteCapsuleType = null)
    {
        $this->favoriteCapsuleType      = $favoriteCapsuleType;
        $this->hasFavoriteCapsuleType   = $favoriteCapsuleType ? true : false;
    }

    /**
     * @return boolean
     */
    public function hasFavoriteCapsuleType()
    {
        return $this->hasFavoriteCapsuleType;
    }

    /**
     * @param boolean $hasFavoriteCapsuleType
     */
    public function setHasFavoriteCapsuleType($hasFavoriteCapsuleType)
    {
        $this->hasFavoriteCapsuleType = $hasFavoriteCapsuleType;
    }
}

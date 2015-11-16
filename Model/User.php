<?php

namespace Model;

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
     * @return CapsuleType
     */
    public function getFavoriteCapsuleType()
    {
        return $this->favoriteCapsuleType;
    }

    /**
     * @param CapsuleType $favoriteCapsuleType
     */
    public function setFavoriteCapsuleType(CapsuleType $favoriteCapsuleType)
    {
        $this->favoriteCapsuleType = $favoriteCapsuleType;
    }
}

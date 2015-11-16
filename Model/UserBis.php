<?php

namespace Model;

/** @Entity */
class UserBis
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
     * The CapsuleType as a serialized object.
     *
     * @var CapsuleType
     *
     * @Column(type="object", nullable=true)
     */
    private $favoriteCapsuleTypeAsObject;

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
    public function getFavoriteCapsuleTypeAsObject()
    {
        return $this->favoriteCapsuleTypeAsObject;
    }

    /**
     * @param CapsuleType $favoriteCapsuleTypeAsObject
     */
    public function setFavoriteCapsuleTypeAsObject(CapsuleType $favoriteCapsuleTypeAsObject)
    {
        $this->favoriteCapsuleTypeAsObject = $favoriteCapsuleTypeAsObject;
    }
}

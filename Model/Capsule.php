<?php

namespace Model;

/** @Entity */
class Capsule
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
     * @var CapsuleType
     *
     * @Embedded(class="CapsuleType")
     */
    private $type;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return CapsuleType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param CapsuleType $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

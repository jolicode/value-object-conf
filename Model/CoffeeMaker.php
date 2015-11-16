<?php

namespace Model;

/** @Entity */
class CoffeeMaker
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
    private $model;

    /**
     * The real Embedded stuff. It's ok but can't be "null"
     * Also, invalid state can came from the database as Doctrine does use the constructor
     *
     * @var Capsule
     *
     * @OneToOne(targetEntity="Capsule")
     * @JoinColumn(referencedColumnName="id")
     */
    private $currentCapsule;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Capsule
     */
    public function getCurrentCapsule()
    {
        return $this->currentCapsule;
    }

    /**
     * @param Capsule $currentCapsule
     */
    public function setCurrentCapsule(Capsule $currentCapsule = null)
    {
        $this->currentCapsule = $currentCapsule;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}

<?php

namespace Model;

/** @Embeddable */
final class CapsuleType
{
    /** @Column(type="string") */
    private $name;

    /** @Column(type="string") */
    private $color;

    /** @Column(type="string") */
    private $baseline;

    /** @Column(type="integer") */
    private $intensity;

    private function __construct() {}

    public static function fromValues($name, $color, $baseline, $intensity)
    {
        $type = new CapsuleType();

        $type->name = $name;
        $type->color = $color;
        $type->baseline = $baseline;
        $type->intensity = $intensity;

        return $type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getBaseline()
    {
        return $this->baseline;
    }

    /**
     * @return int
     */
    public function getIntensity()
    {
        return $this->intensity;
    }
}

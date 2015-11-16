<?php

namespace Model\Nullable;

/** @Embeddable */
final class CapsuleType
{
    /** @Column(type="string", nullable=true) */
    private $name;

    /** @Column(type="string", nullable=true) */
    private $color;

    /** @Column(type="string", nullable=true) */
    private $baseline;

    /** @Column(type="integer", nullable=true) */
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

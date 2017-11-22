<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Weapon
 * @ORM\Entity
 */
class Weapon
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $damage;

    /**
     * @ORM\Column(type="decimal")
     */
    private $damageDistanceCoeff;

    /**
     * @ORM\Column(type="integer")
     */
    private $fireRate;

    /**
     * Player constructor.
     * @param $name
     * @param $damage
     * @param $damageDistanceCoeff
     * @param $fireRate
     */
    public function __construct($name, $damage, $damageDistanceCoeff, $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoeff = $damageDistanceCoeff;
        $this->fireRate = $fireRate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return mixed
     */
    public function getDamageDistanceCoeff()
    {
        return $this->damageDistanceCoeff;
    }

    /**
     * @param mixed $damageDistanceCoeff
     */
    public function setDamageDistanceCoeff($damageDistanceCoeff)
    {
        $this->damageDistanceCoeff = $damageDistanceCoeff;
    }

    /**
     * @return mixed
     */
    public function getFireRate()
    {
        return $this->fireRate;
    }

    /**
     * @param mixed $fireRate
     */
    public function setFireRate($fireRate)
    {
        $this->fireRate = $fireRate;
    }
}
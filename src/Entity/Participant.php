<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipantRepository")
 * @ORM\Table(name="participant")
 */
class Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column()
     */
    private $name;
    /**
     * @ORM\OneToOne(targetEntity="Participant")
     */
    private $target;
    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function getEnable()
    {
        return $this->enable;
    }

    public function setEnable($enable)
    {
        $this->enable = $enable;
    }


}
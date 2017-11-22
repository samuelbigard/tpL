<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 22/11/17
 * Time: 11:02
 */

namespace App\Fight;


use App\Entity\Weapon;

class FightHandler
{
    private $damageCalculator;

    public function __construct(DamageCalculator $damageCalculator)
    {
        $this->damageCalculator = $damageCalculator;
    }

    public function handle(Fight $fight){
        $damage = $this->damageCalculator->calculate($fight->player->getCurrentWeapon(), $fight->distance);
        $fight->target->setHealthPoint($fight->target->getHealthPoint() - $damage);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 22/11/17
 * Time: 11:05
 */

namespace App\Fight;


use App\Entity\Weapon;

class DamageCalculator
{
    public function calculate(Weapon $weapon, int $range){
        $damage = $weapon->getDamage() - ($weapon->getDamageDistanceCoeff() * $range);

        if($damage < 0){
            return 0;
        }
        return round($damage);
    }
}
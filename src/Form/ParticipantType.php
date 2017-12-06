<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ParticipantType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Participant::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name")
            ->add("enable")
            ->add('submit', SubmitType::class);
    }
}
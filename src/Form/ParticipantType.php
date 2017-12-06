<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends \Symfony\Component\Form\AbstractType
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
<?php

namespace App\Form;

use App\Entity\category;
use App\Entity\Reminder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReminderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('displayDate', null, [
                'widget' => 'single_text',
            ])
            ->add('isDone')
            ->add('category', EntityType::class, [
                'class' => category::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reminder::class,
        ]);
    }
}

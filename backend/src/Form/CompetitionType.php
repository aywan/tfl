<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Competition;
use App\Enum\CompetitionWeight;
use App\RequestDO\CompetitionRequest;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title',
            ])
            ->add('startAt', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('endAt', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('title')
            ->add('description')
            ->add('weight', ChoiceType::class, [
                'choices' => CompetitionWeight::getCatList(),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompetitionRequest::class,
        ]);
    }
}

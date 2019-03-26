<?php

namespace App\Form;

use App\Entity\Option;
use App\Entity\PropertySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class, [
                'required' => false, 
                'label' => false, 
                'attr' => [
                    'placeholder' => 'Budget maximal'
                ]
            ])
            ->add('minSurface',  IntegerType::class, [
                'required' => false, 
                'label' => false, 
                'attr' => [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('options', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Option::class, 
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('distance', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    '5km' => 5,
                    '10km' => 10,
                    '100km' => 100
                ]
            ])
            ->add('address', null, [
                'label' => false,
                'required' => false
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    //Eviter les longs parametres dans l'url
    public function getBlockPrefix()
    {
        return '';
    }
}

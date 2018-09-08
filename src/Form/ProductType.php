<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, array('label' => 'Codigo: '))
            ->add('name', TextType::class, array('label' => 'Nombre: '))
            ->add('description', TextType::class, array('label' => 'Descripcion: '))
            ->add('brand', TextType::class, array('label' => 'Marca: '))
            ->add('price', NumberType::class, array(
                'label' => 'Precio:',
                'grouping' => true
            ))
            ->add('category', EntityType::class, array(
                'class' => Category::class,
                'placeholder' => '-- Selecione Uno --',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

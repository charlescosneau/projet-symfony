<?php

namespace App\Form;

use App\Entity\Items;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Classe\Search;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
//        $builder
//            ->add('string', TextType::class, [
//                'label' => false,
//                'required' => false,
//                'attr' => [
//                    'placeholder' => 'Votre recherche...',
//                    'class' => 'form-control-sm'
//                ]
//            ])
//            ->add('tag', TextType::class, [
//                'label' => false,
//                'required' => false,
//            ])
//            ->add('submit', SubmitType::class, [
//                'label' => "Filtrer",
//                'attr' => [
//                    'class' => 'btn-block btn-info'
//                ]
//            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Items::class,
        ]);
    }
}

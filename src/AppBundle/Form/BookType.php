<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isnb', TextType::class, [
                'label' => 'Numéro ISNB',
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control']
            ])
            ->add('author', EntityType::class, [
                'class' => 'AppBundle\Entity\Author',
                'choice_label' => 'name',
                'choice_value' => 'id',
                'label' => 'Auteur',
                'attr' => ['class' => 'form-control']
            ])
            ->add('release_date', DateType::class, [
                'label' => 'Date de parution',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('page_number', IntegerType::class, [
                'label' => 'Nombre de page',
                'attr' => ['class' => 'form-control']
            ])
            ->add('resume', TextareaType::class, [
                'label' => 'Résumé',
                'attr' => ['class' => 'form-control']
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix',
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class', 'AppBundle\Entity\Book']);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_book_type';
    }
}

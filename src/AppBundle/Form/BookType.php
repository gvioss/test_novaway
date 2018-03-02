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
                'required' => true
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('author', EntityType::class, [
                'class' => 'AppBundle\Entity\Author',
                'choice_label' => 'name',
                'choice_value' => 'id',
                'label' => 'Auteur'
            ])
            ->add('release_date', DateType::class, [
                'label' => 'Date de parution',
                'widget' => 'single_text'
            ])
            ->add('page_number', IntegerType::class, [
                'label' => 'Nombre de page'
            ])
            ->add('resume', TextareaType::class, [
                'label' => 'Résumé'
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix'
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

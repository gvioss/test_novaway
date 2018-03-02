<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isnb')
            ->add('title')
            ->add('author', EntityType::class, [
                'class' => 'AppBundle\Entity\Author',
                'choice_label' => 'name',
                'choice_value' => 'id'
            ])
            ->add('release_date')
            ->add('page_number')
            ->add('resume')
            ->add('price')
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

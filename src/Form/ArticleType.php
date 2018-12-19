<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('category', ChoiceType::class, array(
                'choices'  => array(
                    'Développement' => 'developpement',
                    'Design' => 'design',
                    'Marketing' => 'marketing',
                ),
            ))
            ->add('content', TextareaType::class, array(
                'attr' => array('class' => 'ckeditor'),
             'label'=>'Votre article',
            ))
            ->add('Ajouter', SubmitType::class, array(
                'attr'=> array(
                    'class'=>'btn btn-login float-right'
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

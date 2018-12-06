<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control',
                ),
                'label'=>' ',
            ))
            ->add('firstname', TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control',
                ),
                'label'=>' ',
            ))
            ->add('login', TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control',
                ),
                'label'=>' ',
            ))
            ->add('email', EmailType::class, array(
                'attr'=>array(
                    'class'=>'form-control',
                ),
                'label'=>' ',
            ))
            ->add('password', PasswordType::class, array(
                'attr' => array(
                    'class'=>'form-control'
                ),
                'label'=>' '
            ))
            ->add('Modifier', SubmitType::class, array(
                'attr'=> array(
                    'class'=>'btn btn-login float-right'
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
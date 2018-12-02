<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConnexionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Login', TextType::class, array(
                'attr'=>array(
                    'placeholder'=>'Login'
                ),
                'label'=>' '
            ))
            ->add('password', PasswordType::class, array(
                'attr' => array(
                    'placeholder' => 'Mot de passe',
                ),
                'label'=>' '
            ))
            ->add('Connexion', SubmitType::class, array(
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
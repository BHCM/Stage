<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',null,['label'=>'Prenom'])
            ->add('lastName',null,['label'=>'Nom'])
            ->add('password',PasswordType::class,['label'=>'Mot de Passe'])
            ->add('imageFile', VichImageType::class, [
                'label'=>'Image',
                'required' => true,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => true,
                'imagine_pattern' => 'user_form_thumb',
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}

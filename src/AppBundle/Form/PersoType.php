<?php
/**
 * Created by PhpStorm.
 * User: letaaz
 * Date: 21/03/19
 * Time: 09:39
 */

namespace AppBundle\Form;


use AppBundle\Entity\Perso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('create', SubmitType::class, ['label' => 'Create my Perso'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Perso::class
        ]);
    }
}
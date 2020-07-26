<?php


namespace App\Backend\Email\Form\Email;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EmailAddressFormType extends AbstractType
{

    /** @inheritDoc */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class)
            ->add('name', TextType::class, ['required' => false])
        ;
    }

}
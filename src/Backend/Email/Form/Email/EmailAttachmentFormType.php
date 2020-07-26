<?php


namespace App\Backend\Email\Form\Email;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EmailAttachmentFormType extends AbstractType
{

    /** @inheritDoc */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content_type', TextType::class)
            ->add('filename', TextType::class)
            ->add('content_base64', TextType::class)
        ;
    }

}
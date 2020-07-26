<?php


namespace App\Backend\Email\Form;

use App\Backend\Email\EmailCreateRequest;
use App\Backend\Email\Form\Email\EmailAddressFormType;
use App\Backend\Email\Form\Email\EmailAttachmentFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmailCreateFormType extends AbstractType
{
    /** @inheritDoc */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('from', EmailAddressFormType::class, [
                'constraints' => [ new NotBlank() ]
            ])
            ->add('to', CollectionType::class, [
                'entry_type' => EmailAddressFormType::class,
                'allow_add' => true,
                'constraints' => [ new NotBlank() ]
             ])
            ->add('cc', CollectionType::class, [
                'entry_type' => EmailAddressFormType::class,
                'allow_add' => true
            ])
            ->add('bcc', CollectionType::class, [
                'entry_type' => EmailAddressFormType::class,
                'allow_add' => true
            ])
            ->add('subject', TextType::class, ['required' => false])
            ->add('bodyHtml', TextType::class, ['required' => false])
            ->add('bodyText', TextType::class)
            ->add('attachments', CollectionType::class, [
                'entry_type' => EmailAttachmentFormType::class,
                'allow_add' => true
            ])
        ;
    }

    /** @inheritDoc */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', EmailCreateRequest::class);
    }

}
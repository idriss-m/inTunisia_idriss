<?php
namespace UserBundleForm;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder->add('Rôle');
   }

   public function getParent()
   {
       return 'FOSUserBundleFormTypeRegistrationFormType';

   }

   public function getBlockPrefix()
   {
       return 'app_user_registration';
   }
}
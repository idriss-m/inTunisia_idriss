<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder->add('Rôle');
   }

   public function getParent()
   {
       return 'fos_user_profile';

   }

   public function getBlockPrefix()
   {
       return 'app_user_profile';
   }
}
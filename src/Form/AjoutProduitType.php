<?php

namespace App\Form;

use App\Entity\Lampe;
use App\Entity\TypeLampe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AjoutProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('image', FileType::class, array('label' => 'Fichier', 'mapped'=>false,'attr' => ['class'=>
'form-control'], 'label_attr' => ['class'=> 'fw-bold'],'constraints' => [
new File([
'maxSize' => '200k',
'mimeTypes' => [
'application/pdf',
'application/x-pdf',
'image/jpeg',
'image/png',
],
'mimeTypesMessage' => 'Le site accepte uniquement les fichiers PDF, PNG et JPG',
])
],))
            ->add('nom')
            ->add('description')
            ->add('prix')
            ->add('typeLampe', EntityType::class, [
                'class' => TypeLampe::class,
                'choice_label' => 'id',
            ])
            ->add('ajouter', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],
'row_attr' => ['class' => 'text-center'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lampe::class,
        ]);
    }
}

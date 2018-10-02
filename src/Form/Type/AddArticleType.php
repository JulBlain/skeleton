<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 02/10/18
 * Time: 15:37
 */

namespace App\Form\Type;


use App\Domain\DTO\NewArticleDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('content', TextareaType::class)
           ->add('title', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class' => NewArticleDTO::class,
           'empty_data' => function (FormInterface $form) {
                return new NewArticleDTO(
                    $form->get('content')->getData(),
                    $form->get('title')->getData()
                );
           }
       ]);
    }
}
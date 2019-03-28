<?php
namespace Lrnflx\RecaptchaBundle\Type;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RecaptchaSubmitType extends AbstractType{

    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'mapped' => false
        ]);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {   //To not have label 
        $view->vars['label'] = false;
        //To send the key for data-sitekey attribut 
        $views->vars['key'] = $this->key;
        //To have the label passed in options
        $view->vars['button'] = $options['label'];
    }

    public function getBlockPrefix(){
        return 'recaptcha_submit';
    }

    public function getParent()
    {
        return TextType::class;
    }
}
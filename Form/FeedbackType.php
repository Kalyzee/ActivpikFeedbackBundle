<?php

namespace Activpik\FeedbackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FeedbackType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('type', 'choice', array(
    		'choices'   => array(
        	'1'   => 'Suggérer une amélioration',
        	'2' => 'Reporter une anomalie',
		 	),
			'expanded' => "false"
		)
		)
		->add('email', "email", array(
				'label'=> 'Votre adresse e-mail',
				'attr' => array(
						'placeholder' => 'E-mail',
				),
				'data' => 'E-mail'
				
		)
		)
		->add('subject', "text", array(
				'label'=> 'Sujet',
				'attr' => array(
						'placeholder' => 'Sujet',
				),
				'data' => 'Sujet'
				
		)
		)
		->add('comment', "textarea", array(
				'label'=> 'Votre commentaire',
				'attr' => array(
						'placeholder' => 'Votre commentaire',
				),
				'data' => 'Votre commentaire'
				
		)
		);
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(

		));
	}

	public function getName()
	{
		return 'activpik_feedbackbundle_feedbacktype';
	}
}

<?php

namespace Activpik\FeedbackBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class FeedbackExtension extends \Twig_Extension {

    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function getFunctions() {
        return array(
            'feedback' => new \Twig_Function_Method($this, 'getFeedbackForm', array('is_safe' => array('html'))),);
    }

    public function getFeedbackForm() {
        $feedbackType   = new \Activpik\FeedbackBundle\Form\FeedbackType();
        $form           = $this->container->get('form.factory')->create($feedbackType);
        return $this->container->get("templating")->render(
                "ActivpikFeedbackBundle:Feedback:badge.html.twig",
                array( 'feedback_type' => $form->createView())
        );
    }

    public function getName() {
        return 'feedbackExtension';
    }
}

?>
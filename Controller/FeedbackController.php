<?php

namespace Activpik\FeedbackBundle\Controller;

use Activpik\FeedbackBundle\Vendor\BaseFeedback\FeedbackReportFactory as FeedbackReportFactory;

use Activpik\FeedbackBundle\Form\FeedbackType as FeedbackType;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Response;



class FeedbackController extends Controller
{
	
	
	/**
	 *  @DI\Inject("activpik.feedback_source")
	 * 
	 */
	 private $feedback;
	
	
	/**
	 * @Route("/send", name="feedback_send")
	 * @Method({"POST"})
	 * @Template()
	 */
	public function indexAction(Request $request)
	{
		//$subject = $request->get("subject");
		//$type = $request->get("type");
		//$comments = $request->get("comment");
		//$email = $request->get("email");
		
		$formFeedback = new FeedbackType();
		$form = $this->createForm($formFeedback);
		$form->bind($request);
		
		if($form->isValid()){
		    $user   = null;
                    $token  = $this->get('security.context')->getToken();
                    
                    if ($token != null){
                        $user = $token->getUser();
                    }

                    return new Response(json_encode($this->feedback->sendFeedback(FeedbackReportFactory::getInstance()->createFeedbackReport($form["subject"]->getData(),$form["comment"]->getData(), $form["type"]->getData(), $form["email"]->getData(), $this->getRequest()->headers->get('referer'), $_SERVER["HTTP_USER_AGENT"], $_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_ACCEPT_LANGUAGE"], $user))));
		}
		return new Response("{error : 'Please verify paremeters'}");
		
	}
}

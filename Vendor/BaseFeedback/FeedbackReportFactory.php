<?php
	
	namespace Activpik\FeedbackBundle\Vendor\BaseFeedback;
	
	use Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces\IFeedbackReport as IFeedbackReport;
	
	use Activpik\FeedbackBundle\Vendor\BaseFeedback\FeedbackReport as FeedbackReport;
	
	use Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces\IFeedbackReportFactory as IFeedbackReportFactory;

	/**
	 *
	 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
	 *
	 */
	class FeedbackReportFactory implements IFeedbackReportFactory{
		private static $instance;
		
		private function FeedbackReportFactory(){
				
		}
		
		
		public function createFeedbackReport($subject, $comment, $type, $email, $referer, $userAgent, $remoteAddr, $language, $user){
			return new FeedbackReport($subject, $comment, $type, $email, $referer, $userAgent, $remoteAddr, $language, $user);
		}
		
		public static function getInstance(){
			if (self::$instance == null){
				self::$instance = new FeedbackReportFactory();
			}	
				return self::$instance;
			
			
		}
		
	}
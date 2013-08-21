<?php

	namespace Activpik\FeedbackBundle\Vendor\BaseFeedback;
	
	use Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces\IFeedbackReport as IFeedbackReport;
	
	/**
	 *
	 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
	 *
	 */
	class FeedbackReport implements IFeedbackReport{
		
		private $subject;
		private $type;
		private $comment;
		private $email;
		private $referer;
		private $userAgent;
		private $remoteAddr;
		private $language;
		private $user;
		
		public function __construct($subject, $comment, $type, $email, $referer, $userAgent, $remoteAddr, $language, $user){
			
			$this->subject = $subject;
			$this->comment = $comment;
			$this->type = $type;
			$this->email = $email;
			$this->referer = $referer;
			$this->userAgent = $userAgent;
			$this->remoteAddr = $remoteAddr;
			$this->language = $language;
			$this->user = $user;
		}
		
		function getSubject(){
			return $this->subject;
		}
		
		function getType(){
			return $this->type;
		}
		
		function getComment(){
			return $this->comment;
		}
		
		function getEmail(){
			return $this->email;
		}
		
		function getReferer(){
			return $this->referer;
		}
		function getUserAgent(){
			return $this->userAgent;
		}
		
		function getRemoteAddr(){
			return $this->remoteAddr;
		}
		function getLanguage(){
			return $this->language;
		}
		/**
		 * Peut retourner null si l'utilisateur n'existe pas.
		*/
		function getUser(){
			return $this->user;
		}
		
	}
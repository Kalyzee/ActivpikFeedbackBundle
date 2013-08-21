<?php

	namespace Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces;


	/**
	 * IFeedback Reports
	 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
	 *
	 */
	interface IFeedbackReport{
		
		function __construct($subject, $comment, $type, $email, $referer, $userAgent, $remoteAddr, $language, $user);
		
		function getSubject();
		function getType();
		function getComment();
		function getEmail();
		function getReferer();
		function getUserAgent();
		function getRemoteAddr();
		function getLanguage();
		/**
		 * Peut retourner anon si l'utilisateur n'existe pas.
		 */
		function getUser();
		
			
	}
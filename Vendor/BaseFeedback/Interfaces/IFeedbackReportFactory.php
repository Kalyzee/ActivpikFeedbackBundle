<?php

namespace Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces;

/**
 * 
 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
 *
 */
interface IFeedbackReportFactory{
	public function createFeedbackReport($subject, $comment, $type, $email, $referer, $userAgent, $remoteAddr, $language, $user);
}
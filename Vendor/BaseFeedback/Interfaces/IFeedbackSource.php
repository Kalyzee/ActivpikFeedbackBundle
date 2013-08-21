<?php

namespace Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces;

use Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces\IFeedbackReport as IFeedbackSource;

/**
 *
 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
 *
 */
interface IFeedbackSource{
	function sendFeedback(IFeedbackReport $feedback);
	
} 
<?php 
namespace Activpik\FeedbackBundle\Tests\Vendor\BaseFeedback;

use Activpik\FeedbackBundle\Vendor\BaseFeedback\FeedbackReport as FeedbackReportTest;

class FeedbackReportTest extends \PHPUnit_Framework_TestCase
{
	public function testConstruct(){
		
		$subject = "Sujet 1";
		$comment = "Commentaire A";
		
		$feedbackReport = new FeedbackReport($subject, $comment, 1, "moi@moi.com", "http://blablablabla.com", "Mozilla Firefox 2010", "http://test.test", "FR-fr", "anon");
		$this->assertEquals($subject, $feedbackReport->getSubject());
	}
}
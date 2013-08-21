<?php
	namespace Activpik\FeedbackBundle\Vendor\RedmineFeedback;
	
	use Activpik\FeedbackBundle\Vendor\BaseFeedback\Interfaces\IFeedbackReport as IFeedbackReport;
	use Activpik\FeedbackBundle\Vendor\Tools\RestClient as RestClient;
	
	
	/**
	 *
	 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
	 *
	 */
	class RedmineFeedbackSource{
		
		private $url;
		private $apiKey;
		private $projectId;
		private $priorityId;
		
		function __construct($url, $apikey, $projectId, $priorityId){
			$this->url = $url;
			$this->apiKey = $apikey;
			$this->projectId = $projectId;
			$this->priorityId = $priorityId;
		}
		
		function sendFeedback($feedback){
			//-- On prépare l'objet --
			$issue = new \StdClass();
			$issue->project_id = $this->projectId;
			
			//-- TODO Récuperer valeurs par POST --
			$issue->subject = $feedback->getSubject();
			$issue->description = $feedback->getComment()."<pre> Email : ".$feedback->getEmail(). "\n Lien : ". $feedback->getReferer(). "\n Navigateur :".$feedback->getUserAgent()."\n Ip : ".$feedback->getRemoteAddr(). "\n Language : ".$feedback->getLanguage(). "\n Utilisateur : ".$feedback->getUser()."</pre>";
			$issue->priority_id = $this->priorityId;
			$issue->tracker_id = $feedback->getType();
			
			
			$object = new \StdClass();
			$object->issue = $issue;
				
			//-- on l'encode au format JSON --
			$object = json_encode($object);
			
			$client = new RestClient($this->url);
						
			$result = $client->doPost(array("key"=>$this->apiKey), $object);
			
			
			return $result;
		}
	}
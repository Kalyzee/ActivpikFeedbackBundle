Symfony 2 Feedbackbundle
========================

Improvements for futures revisions :
- Unit tests
- Embedded controller in twig views to simplify integration. 


Get FeedbackBundle with composer
Add this dependency
        "activpik/feedback-bundle": "dev-trunk" 

On your AppKernel.php file add :
	new Activpik\Feedback\ActivpikFeedbackBundle(),

On your config.yml file you can add  
In services section :
```
services:
    activpik.feedback_source:
        class:        Activpik\FeedbackBundle\Vendor\RedmineFeedback\RedmineFeedbackSource
        arguments:    ["https://urltoredmine/redmine/projects/myproject/issues.json", "ApiKey", "projectId", Priority]
```

and on your routing.yml file :

```
ActivpikFeedbackBundle:
     resource: "@ActivpikFeedbackBundle/Controller/" 
     type:     annotation
     prefix:   /
```

On the controllers using feedback badge : 

```
$feedbackType = new FeedbackType();
$data["feedback_type"] = $this->createForm($feedbackType)->createView();
```

```
use Activpik\FeedbackBundle\Form\FeedbackType;
```


On twig view Add :

```
<link rel="stylesheet" href="{{ asset('bundles/activpikfeedback/css/feedback.css') }}" />    
<script type="text/javascript" href="{{ asset('bundles/activpikfeedback/js/feedback.js') }}" ></script>
```

and

```
{% include 'ActivpikFeedbackBundle:Feedback:badge.html.twig' %}
```

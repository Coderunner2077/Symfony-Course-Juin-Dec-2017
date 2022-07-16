<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdvertController {
    // La route serait par exemple :
    // /advert/{advert_id}/applications/{application_id}
    
    /**
     * ParamConverter("advert", options={"mapping": {"advert_id": "id"}})
     * ParamConverter("application", options={"mapping": {"application_id": "id"}})
     */
    public function viewAction(Advert $advert, Application $application) {
        
    }
}
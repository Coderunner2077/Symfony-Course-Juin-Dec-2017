<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdvertController {
    // La route serait par exemple :
    // /platform/advert/{advert_id}/{skill_id}
    
    /**
     * ParamConverter("advertSkill", options={"mapping": {"advert_id": "advert", "skill_id": "skill"}})
     */
    public function viewAction(AdvertSkill $advertSkill) {
        
    }
}
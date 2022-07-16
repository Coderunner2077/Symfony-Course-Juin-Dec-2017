<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdvertController {
    /**
     * @ParamConverter("advert", options={"mapping": {"advert_id": "id"}})
     */
    public function viewAction(Advert $advert) {
        
    }
}
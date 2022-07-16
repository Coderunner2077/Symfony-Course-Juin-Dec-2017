<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdvertController {
    /**
     * @ParamConverter("json")
     */
    public function paramConverterAction(array $json) {
        return new Response(print_r($json, true));
    }
}
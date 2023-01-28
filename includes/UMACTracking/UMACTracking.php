<?php

require_once __DIR__ . '/UMAC_AccessExternalResource.php';
require_once __DIR__ . '/ProcessUMACTrackingHtml.php';

function getUMACTracking($request)
{
    try {
        $trackingData = $request['trackingData'];
        $accessExternalResource = new UMAC_AccessExternalResource();
        $response = $accessExternalResource->getUMACTracking($trackingData);
        $processUMACTrackingHtml = new ProcessUMACTrackingHtml();
        $trackingSection = $processUMACTrackingHtml->getTrackingSection($response);
        return base64_encode($trackingSection);
    } catch (\Throwable$th) {
        return base64_encode("Error processing request..." . $th);
    }
}

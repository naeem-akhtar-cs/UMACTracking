<?php

function UMACTrackingShortCode()
{
    ob_start();
    include __DIR__ . './../../public/partials/UMACTrackingShortCode.html';
    return ob_get_clean();
}

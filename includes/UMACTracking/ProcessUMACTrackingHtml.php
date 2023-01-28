<?php

class ProcessUMACTrackingHtml
{
    public function getTrackingSection($html)
    {
        $startPos = strpos($html, '<div class="transportaion_area">');
        $endPos = strpos($html, '<footer class="footer">');
        $trackingSection = substr($html, $startPos, $endPos - $startPos);
        return $trackingSection;
    }
}

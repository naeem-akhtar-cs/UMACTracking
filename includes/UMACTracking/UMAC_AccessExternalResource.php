<?php

class UMAC_AccessExternalResource
{
    public function getUMACTracking($trackingData)
    {
        try {
            $trackingData = json_decode(base64_decode($trackingData));
            $boxNumber = $trackingData->boxNumber;
            $lastName = $trackingData->lastName;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://umactracking.com/manifest/search?boxno={$boxNumber}&lname={$lastName}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                    'Accept-Language: en-US,en;q=0.9,ur;q=0.8',
                    'Cache-Control: max-age=0',
                    'Connection: keep-alive',
                    'Referer: https://umactracking.com',
                    'Sec-Fetch-Dest: document',
                    'Sec-Fetch-Mode: navigate',
                    'Sec-Fetch-User: ?1',
                    'Upgrade-Insecure-Requests: 1',
                    'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                    'sec-ch-ua: "Not_A Brand";v="99", "Google Chrome";v="109", "Chromium";v="109"',
                    'sec-ch-ua-mobile: ?0',
                    'sec-ch-ua-platform: "Linux"',
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;
        } catch (\Throwable$th) {
            throw new Exception($th);
        }
    }
}

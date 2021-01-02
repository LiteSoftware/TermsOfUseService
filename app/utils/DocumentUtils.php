<?php

use Curl\Curl;

class DocumentUtils {

    public static function getDOMXpath(string $url) : \DOMXpath {
        $domDocument = self::getDOMDocument($url);
        $xpath = new \DOMXpath($domDocument);

        return $xpath;
    }

    public static function getDOMDocument(string $url) : DOMDocument {
        $htmlDocument =self::getTextDocument($url);
        $dom = new DOMDocument;
        @$dom->loadHTML($htmlDocument);

        return $dom;
    }

    public static function getTextDocument(string $url): string {
        $curl = self::getCurl();
        $response = $curl->get($url)->response;
        
        if ($curl->error) {
            throw new CurlException('Error on url ' . $url, $curl->error_code);
        }

        return $response;
    }

    public static function getCurl(): Curl {
        $curlLib = new Curl;
        $curlLib->setOpt(CURLOPT_CONNECTTIMEOUT, 30);
        $curlLib->setOpt(CURLOPT_TIMEOUT_MS, 5000);

        return $curlLib;
    }
}
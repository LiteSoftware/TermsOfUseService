<?php

class HttpHeaderRepository implements HttpHeaderRepositoryInterface {

    public function getHeader(String $key) : Header {
        $headers = getAllHeaders();

        if (!isset($headers[$key])) {
            throw new BadRequestException($key . ' Not Found', 400);
        }
        return new Header($key, $headers[$key]); 
    }
}
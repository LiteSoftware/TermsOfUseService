<?php

class Header {

    private $key;

    private $value;

    public function __construct(string $key, string $value) {
        $this->key = $key;
        $this->value = $value;    
    }

    public function getKey() : string {
        return $this->key;
    }

    public function getValue() : string {
        return trim($this->value);
    }
}
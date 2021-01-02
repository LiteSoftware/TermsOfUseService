<?php

interface HttpHeaderRepositoryInterface {

    public function getHeader(string $key) : Header;
}
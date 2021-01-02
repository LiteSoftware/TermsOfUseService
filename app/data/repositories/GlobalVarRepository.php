<?php

interface GlobalVarRepository {

    public function getString(string $key, string $defaultValue) : string;

    public function getInt(string $key, int $defaultValue) : int;

    public function containtKey(String $key) : bool;

    public function containtValue(String $value) : bool;

    public function getAll() : array;
}
<?php

class GlobalGetRepository implements GlobalVarRepository {

    public function getString(string $key, string $defaultValue) : string {
        $val = (string) $this->get($key, $defaultValue);

        return $val;
    }

    public function getInt(string $key, int $defaultValue) : int {
        $val = (int) $this->get($key, $defaultValue);

        return $val;
    }

    /**
     * @param int|string $defaultValue
     * @return int|string
     */
    private function get(string $key, $defaultValue) {
        $value = $this->containtKey($key) ? $_GET[$key] : $defaultValue;
        return $value;
    }

    public function containtKey(string $key): bool {
        return isset($_GET[$key]);
    }

    public function containtValue(string $value) : bool {
        return empty($value); 
    }

    public function getAll() : array {
        return $_GET;
    }
}
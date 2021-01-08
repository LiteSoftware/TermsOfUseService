<?php

interface BaseViewInterface {

    public function includeHeaderTemplate();

    public function includeFooterTemplate();

    public function setTemplate(string $name, string $type = 'json');

    public function setContent(string $content);

    public function render();
}
<?php

class RepositoriesFactory {
    
    public static function createHttpHeaderRepository() : HttpHeaderRepositoryInterface {
        return new HttpHeaderRepository();
    }
}
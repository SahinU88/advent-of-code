<?php

use Illuminate\Support\Collection;

require_once 'vendor/autoload.php';

$passphrases = file_get_contents( 'passphrases.txt' );

Collection::macro( 'hasDuplicates', function(){
    return collect( array_count_values( $this->toArray() ) )
        ->filter( function( $value, $key ){
            return $value > 1;
        })
        ->isNotEmpty();
});


echo collect( explode( PHP_EOL, $passphrases ) )
        ->reject( function( $row ){
            return collect( explode( ' ', $row ) )->hasDuplicates();
        })
        ->count();
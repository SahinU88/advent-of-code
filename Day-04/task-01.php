<?php

use Illuminate\Support\Collection;

require_once 'vendor/autoload.php';

$passphrases = file_get_contents( 'passphrases.txt' );

Collection::macro( 'duplicates', function(){
    return collect( array_count_values( $this->toArray() ) )
        ->filter( function( $value, $key ){
            return $value > 1;
        });
});


echo collect( explode( PHP_EOL, $passphrases ) )
        ->reject( function( $row ){
            $words = collect( explode( ' ', $row ) );
            
            return $words->duplicates()->isNotEmpty();
        })
        ->count();
<?php

use Illuminate\Support\Collection;

require_once 'vendor/autoload.php';

$passphrases = file_get_contents( 'passphrases.txt' );

function is_anagram( $a, $b )
{
    return ( count_chars( $a, 1 ) == count_chars( $b, 1 ) );
}

Collection::macro( 'duplicates', function(){
    return collect( array_count_values( $this->toArray() ) )
        ->filter( function( $value, $key ){
            return $value > 1;
        });
});

Collection::macro( 'anagrams', function(){
    return $this->crossJoin( $this )->filter( function( $pair ){
        [ $a, $b ] = $pair;
        
        return ( $a !== $b ) && is_anagram( $a, $b );
    });
});


echo collect( explode( PHP_EOL, $passphrases ) )
        ->reject( function( $row ){
            $words = collect( explode( ' ', $row ) );
            
            return $words->duplicates()->isNotEmpty() || $words->anagrams()->isNotEmpty();
        })
        ->count();
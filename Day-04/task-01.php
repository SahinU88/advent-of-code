<?php

require_once 'vendor/autoload.php';

$passphrases = file_get_contents( 'passphrases.txt' );

echo collect( explode( PHP_EOL, $passphrases ) )
        ->reject( function( $row ){
            $words = collect( explode( ' ', $row ) );
        
            return ( $words->unique()->count() < $words->count() );
        })
        ->count();
<?php

$numbers = $argv[ 1 ] ?? false;


if ( !isset( $numbers ) || empty( $numbers ) )
{
    echo 'Please give a sequence of numbers.';
    die();
}


$numbers = str_split( $numbers );

$sum = 0;
$first = $numbers[ 0 ];

while( $c = array_shift( $numbers ) ){
    $sum = ( !empty( $numbers ) && $c === $numbers[ 0 ] ) ? $sum + $c : $sum;
    
    if ( empty( $numbers ) ){
        if ( $first === $c ){
            $sum += $c;
        }
    }
}

echo $sum;
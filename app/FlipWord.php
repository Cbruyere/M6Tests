<?php

/**
 * Reverse each word in a string.
 *
 * @param string $inputString The string to be reverse
 *
 * @return string
 */
function reverseWord(string $inputString) : string
{
    // we accept that input string contains a space character between each word
    $finalWordsArray = [];

    foreach (explode(' ', $inputString) as $word) {
        array_push($finalWordsArray, strrev($word));
    }

    return implode(' ', $finalWordsArray);
}

// use cases
$strings = [
    'Hello World !',
    'Bad Game !',
];

foreach ($strings as $string) {
    var_dump(reverseWord($string));
}


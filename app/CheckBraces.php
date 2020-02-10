<?php

/**
 * Check if we have balanced brackets.
 *
 * @param string $inputString The string to be checked
 * @param array $bracketMap Array of possible brackets to be checked, default only parenthesis checked
 *
 * @return bool
 */
function checkBracketsBalance(string $inputString, array $bracketMap = null) : bool
{
    $bracketMap = $bracketMap ?: ['(' => ')'];
    $bracketMapFlipped = array_flip($bracketMap);

    $stringLength = strlen($inputString); // only for performance
    $bracketsStack = [];

    // iterate on each string characters
    for ($i = 0; $i < $stringLength; $i++) {
        $currentChar = $inputString[$i];

        if (isset($bracketMap[$currentChar])) {
            $bracketsStack[] = $bracketMap[$currentChar];
        } else if (isset($bracketMapFlipped[$currentChar])) {
            $expected = array_pop($bracketsStack);
            if (($expected === NULL) || ($currentChar != $expected)) {
                return false;
            }
        }
    }
    return empty($bracketsStack);
}

// use cases
$strings = [
    '()()(()',
    '(())()(()))',
    '(())(())()',
    '(())(())()',
    ')(())(())()',
    'toto',
    'you win ! ()'
];

foreach ($strings as $string) {
    var_dump(checkBracketsBalance($string));
}


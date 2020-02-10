<?php

/**
 * Check if we have balanced brackets.
 *
 * @param string $string The string to be checked
 * @param array $bracket_map Array of possible brackets to be checked, default only parenthesis checked
 *
 * @return bool
 */
function checkBracketsBalance(string $string, array $bracket_map = null)
{
    $bracket_map = $bracket_map ?: ['(' => ')'];
    $bracket_map_flipped = array_flip($bracket_map);

    $stringLength = strlen($string); // only for performance
    $brackets_stack = [];

    // iterate on each string characters
    for ($i = 0; $i < $stringLength; $i++) {
        $current_char = $string[$i];

        if (isset($bracket_map[$current_char])) {
            $brackets_stack[] = $bracket_map[$current_char];
        } else if (isset($bracket_map_flipped[$current_char])) {
            $expected = array_pop($brackets_stack);
            if (($expected === NULL) || ($current_char != $expected)) {
                return false;
            }
        }
    }
    return empty($brackets_stack);
}

// use cases
$strings = [
    '()()(()',
    '(())()(()))',
    '(())(())()',
    'toto',
    'you win ! ()'
];

foreach ($strings as $string) {
    var_dump(checkBracketsBalance($string));
}


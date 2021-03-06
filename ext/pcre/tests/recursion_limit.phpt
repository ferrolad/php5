--TEST--
PCRE Recursion limit
--INI--
pcre.recursion_limit=2
--FILE--
<?php

var_dump(preg_match_all('/\p{Ll}(\p{L}((\p{Ll}\p{Ll})))/', 'aeiou', $dummy));
var_dump(preg_last_error() === PREG_RECURSION_LIMIT_ERROR);

var_dump(preg_match_all('/\p{Ll}\p{L}\p{Ll}\p{Ll}/', 'aeiou', $dummy));
var_dump(preg_last_error() === PREG_NO_ERROR);

?>
--EXPECT--
int(0)
bool(true)
int(1)
bool(true)

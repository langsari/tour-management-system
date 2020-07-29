<?php

function PMA_recursive_extract($array, &$target, $sanitize = true)
{
    if (! is_array($array)) {
        return false;
    }

    if ($sanitize) {
        $valid_variables = preg_replace($GLOBALS['_import_blacklist'], '',
            array_keys($array));
        $valid_variables = array_unique($valid_variables);
    } else {
        $valid_variables = array_keys($array);
    }

    foreach ($valid_variables as $key) {

        if (strlen($key) === 0) {
            continue;
        }

        if (is_array($array[$key])) {
            // there could be a variable coming from a cookie of
            // another application, with the same name as this array
            unset($target[$key]);

            PMA_recursive_extract($array[$key], $target[$key], false);
        } else {
            $target[$key] = $array[$key];
        }
    }
    return true;
}


/**
 * @var array $_import_blacklist variable names that should NEVER be imported
 *                              from superglobals
 */
$_import_blacklist = array(
    '/^cfg$/i',         // PMA configuration
    '/^server$/i',      // selected server
    '/^db$/i',          // page to display
    '/^table$/i',       // page to display
    '/^goto$/i',        // page to display
    '/^back$/i',        // the page go back
    '/^lang$/i',        // selected language
    '/^convcharset$/i', // PMA convert charset
    '/^collation_connection$/i', //
    '/^set_theme$/i',   //
    '/^sql_query$/i',   // the query to be executed
    '/^GLOBALS$/i',     // the global scope
    '/^str.*$/i',       // PMA localized strings
    '/^_.*$/i',         // PMA does not use variables starting with _ from extern
    '/^.*\s+.*$/i',     // no whitespaces anywhere
    '/^[0-9]+.*$/i',    // numeric variable names
    //'/^PMA_.*$/i',      // other PMA variables
);

if (! empty($_GET)) {
    PMA_recursive_extract($_GET, $GLOBALS);
}

if (! empty($_POST)) {
    PMA_recursive_extract($_POST, $GLOBALS);
}

if (! empty($_FILES)) {
    $_valid_variables = preg_replace($GLOBALS['_import_blacklist'], '', array_keys($_FILES));
    foreach ($_valid_variables as $name) {
        if (strlen($name) != 0) {
            $$name = $_FILES[$name]['tmp_name'];
            ${$name . '_name'} = $_FILES[$name]['name'];
        }
    }
    unset($name, $value);
}

?>

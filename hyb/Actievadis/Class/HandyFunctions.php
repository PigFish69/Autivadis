<?php

function boolToYesNo($boolean)
{
    return $boolean ? "Ja" : "Nee";
}

//scuffed php version of console.log
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function getStartDate($date)
    {
        return date("d-m-Y H:i", strtotime($date));
    }
?>
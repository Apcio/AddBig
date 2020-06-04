<?php
    function addBig(string $val1, string $val2) {
        if(gettype($val1) != "string" || gettype($val2) != "string") return "false";
        if(!ctype_digit($val1) || !ctype_digit($val2)) return "false";
        
        if(strlen($val1) > strlen($val2)) {
            $val2 = str_pad($val2, strlen($val1), "0", STR_PAD_LEFT);
        } else {
            $val1 = str_pad($val1, strlen($val2), "0", STR_PAD_LEFT);
        }

        $result = "";
        $tmp = 0;
        $val = 0;

        for($i = strlen($val1) - 1; $i >= 0; $i--) {
            $val = intval($val1[$i]) + intval($val2[$i]);
            if($tmp == 1) {
                $val += 1;
                $tmp = 0;
            }

            if($val > 9) {
                $tmp = 1;
                $val = $val - 10;
            }

            $result = strval($val) . $result;
        }
        if($tmp > 0) $result = strval($tmp) . $result;

        return $result;
    }

    echo("99 + 99 = " . addBig("99", "99") . "<br>");
    echo("99999 + 99 = " . addBig("99999", "99") . "<br>");
    echo("99 + 99999 = " . addBig("99", "99999") . "<br>");
    echo("99999999999999999999999999999999 + 999999999999999999999999999999999999999999 = " . addBig("99999999999999999999999999999999", "999999999999999999999999999999999999999999") . "<br>");
    echo("9223372036854775808 + 9223372036854775808 = " . addBig("9223372036854775808", "9223372036854775808") . "<br>");
    echo("99.0 + 99999 = " . addBig("99.0", "99999") . "<br>");
    echo("99! + 99999 = " . addBig("99!", "99999") . "<br>");
    echo("99w + 99999 = " . addBig("99w", "99999") . "<br>");
    echo("99 + 999W99 = " . addBig("99", "999W99") . "<br>");
    echo("99 + 999 99 = " . addBig("99", "999 99") . "<br>");
    echo("99 + 99999 &nbsp;= " . addBig("99", "99999 ") . "<br>");
?>
<?php
//validate the inputs by ral_escape_string
function validateInput($dbcon, $input)
{
    return mysqli_real_escape_string($dbcon, trim($input));
}

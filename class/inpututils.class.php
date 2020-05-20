<?php
class InputUtils
{
  public static function is_alphanumeric($input)
  {
    if (preg_match('/[^a-z_\-0-9]/i', $input) == 1) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


}

?>
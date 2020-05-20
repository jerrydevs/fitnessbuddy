<?php
class LoginUtils
{
  public static function possible_new_login($email)
  {
    $_SESSION['form.login.uname'] = $email;
  }

  public static function log_in_user($email)
  {
    $_SESSION['logged_in_user'] = $email;
  }

  public static function log_in_admin($admin)
  {
    $_SESSION['logged_in_admin'] = $admin;
  }

  public static function log_out_admin()
  {
    unset($_SESSION['logged_in_admin']);
  }
  
  public static function log_out_user()
  {
    unset(
      $_SESSION['logged_in_user'],
      $_SESSION['form.login.uname']
    );
  }

  public static function is_user_logged_in()
  {
    return isset($_SESSION['logged_in_user']);
  }

  public static function logged_in_user()
  {
    return isset($_SESSION['logged_in_user'])
      ? $_SESSION['logged_in_user']
      : FALSE;
  }

  public static function is_admin_logged_in()
  {
    return isset($_SESSION['logged_in_admin']);
  }

  public static function logged_in_admin()
  {
    return isset($_SESSION['logged_in_admin'])
      ? $_SESSION['logged_in_admin']
      : FALSE;
  }
}
?>

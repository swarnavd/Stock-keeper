<?php

class Validation {
  /**
   * A function to check that first name or last contains only alphabet or not.
   *
   * @param string $name
   *  User's registered name.
   * @return bool
   *  Returns true if it contains
   */
  public function validFullName(string $name) {
    $nameRegex = "^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$";
    if (preg_match($nameRegex, $name)) {
      return TRUE;
    }
    return FALSE;
  }

  public function validPassword(string $psw) {
    $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
    if (preg_match($passRegex, $psw)) {
      return TRUE;
    }
    return FALSE;
  }
  /**
   * A function to check that email format is valid or not.
   *
   * @param string $email
   *  User's registered email.
   *
   * @return bool
   *  Returns true if it contains correct email.
   */
  public function validEmail(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    }
    return FALSE;
  }
  /**
   * A function to checks that a field is contains only number or not.
   *
   * @param string $number
   *  User's provided input.
   *
   * @return bool
   *  Returns true if it contains only number.
   */
  public function validNumber(int $number) {
    $numberRegex = '/^\d+$/';
    if (preg_match($numberRegex, $number)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * A function to check if a stock's name contains only alphabet or not.
   *
   * @param string $name
   *  Stock's name.
   *
   * @return bool
   *  Returns true if name only contains alphabet else false.
   */
  public function validStock(string $name) {
    $namePattern = '/^[a-zA-Z]+$/';
    if (preg_match($namePattern, $name)) {
      return TRUE;
    }
    return FALSE;
  }
}

<?php

  function validateURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];
    $gender = $_POST['inlineRadioOptions'];

    if (!preg_match('/^[\p{L}\s]+$/u', $name)) {
      echo "<p style='color: red;'>Поле 'name' може містити тільки букви і пробіли.</p>";

      $email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);

      if (!$email_valid) {
        echo "<p style='color: red;'>Поле 'email' повинно містити правильний формат електронної пошти.</p>";

        if (!empty($website) && !validateURL($website)) {
          echo "<p style='color: red;'>Поле 'website' повинно містити правильну URL-адресу.</p>";
        }
      }
    } else {
      echo "<center><h2>Форму прийнято.</h2></center>";
    }
  }
?>
<?php // check if form was submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['responseToken'])) {
  // build POST request:
  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
  $recaptcha_secret = '6LcJVLcUAAAAAByoAbpRocf6QCA6JRqcbS1zsAc6'; // A-Lodge Secret Key
  $recaptcha_secret_test = '6Lcm97cUAAAAAPvnLmteazj_sVVhhVyQhzBES6-J'; // localhost testing Secret Key
  $recaptcha_response = $_POST['responseToken'];
  $verified = false;

  // make and decode POST request:
  $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
  $recaptcha = json_decode($recaptcha);

  // whether this request was a valid reCAPTCHA token for your site
  // && take action based on the score returned:
  // Ref: (1 = human, 0 = bot)
  if ($recaptcha->success && $recaptcha->score >= 0.5) {
    // verified - send email
    $verified = true;
    echo json_encode($verified);
    // echo json_encode([true, $recaptcha->score, $recaptcha->success]);
  } else {
    // not verified - show form error
    echo json_encode($verified);
  }
} ?>
<?php

// E-posta denetleyici fonksiyonu
function email_validator($email) {
  // API URL'si
  $url = "https://api.emailvalidator.co/v1/validate?email=" . $email;
  
  // API anahtarı
  $api_key = "YOUR_API_KEY";
  
  // API çağrısı
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "api-key: " . $api_key
  ));
  $response = curl_exec($ch);
  curl_close($ch);
  
  // API cevabının işlenmesi
  $result = json_decode($response);
  
  // Geçerli mi kontrol et
  if ($result->status == "valid") {
    return true;
  } else {
    return false;
  }
}

// E-posta adresi listesi
$email_list = array(
  "example1@example.com",
  "example2@example.com",
  "example3@example.com"
);

// E-posta adreslerini denetle
foreach ($email_list as $email) {
  if (email_validator($email)) {
    echo $email . " is valid.\n";
  } else {
    echo $email . " is invalid.\n";
  }
}


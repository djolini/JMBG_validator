<?php


// ime sanitizacija i validacija
   $ime = $_POST['ime'];
   $ime = stripslashes($ime);
   $ime = htmlentities($ime);
   $ime = trim($ime);

// prezime sanitizacija i validacija
   $prezime = $_POST['prezime'];
   $prezime = stripslashes($prezime);
   $prezime = htmlentities($prezime);
   $prezime = trim($prezime);

 // email sanitizacija i validacija
    $email = $_POST['email'];
    $email = stripslashes($email);
    $email = htmlentities($email);
    $email = trim($email);

 // broj telefona sanitizacija i validacija
    $telefon = $_POST['telefon'];
    $telefon = stripslashes($telefon);
    $telefon = htmlentities($telefon);
    $telefon = trim($telefon);
    $telefon =  str_replace("-", "",$telefon);
    $telefon =  str_replace("+", "",$telefon);


// jmbg sanitizacija i validacija
   $jmbg = $_POST['jmbg'];
   $jmbg = stripslashes($jmbg);
   $jmbg = htmlentities($jmbg);
   $jmbg = trim($jmbg);

   $omiljena_boja = $_POST['omiljena_boja'];

// Proverava da li je sve popunjeno i da li su svi karakteri imena i prezimena slova i da li telefon sadrzi samo brojeve
if( $ime !== '' &&  $prezime !== ''   && $jmbg !== '' && ctype_alpha($ime) && ctype_alpha($prezime) && is_numeric($telefon) && strlen($telefon)>6) {
  $podaci_ispravni = 1;

  if (strlen($ime) !== 1 && strlen($prezime) !== 1) {
    $podaci_ispravni = 1;

      if (filter_var($jmbg, FILTER_VALIDATE_INT) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
          $podaci_ispravni = 1;
      } else {
          $podaci_ispravni = 0;
      }

     // funkcija preg_match kao rezultat vraca O ili 1
    $pattern = "/^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([09][0-9]{2})([0-8][0-9]|9[0-6])([0-9]{3})(\d)$/";
    if (preg_match($pattern, $jmbg)) {
      $podaci_ispravni = 1;
    } else {
      $podaci_ispravni = 0;
    }

  }else {
    $podaci_ispravni = 0;
  }
}else {
  $podaci_ispravni = 0;
}


if ($podaci_ispravni == 1) {
  $za_ajax = array(
    "status"=> true,
    "poruka" => "sve je okej sa Vasim podacima"
  );
}else {
  $za_ajax = array(
    "status"=> false,
    "poruka" => "Pokusajte ponovo,ovaj put sa ispravnim podacima"
  );
}

print_r(json_encode($za_ajax));

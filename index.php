<?php 
$msg = "complete the form";
$firstname = "";
$surname = "";
$email = "";
$message = "";

if (isset($_POST["firstname"], $_POST["surname"], $_POST["email"], $_POST["message"])) {
   $conexao = new PDO("mysql:host=127.0.0.1;dbname=programming", "root",); 
  
   $firstname=filter_input(INPUT_POST, "firstname",FILTER_UNSAFE_RAW);
   $surname=filter_input(INPUT_POST, "surname",FILTER_UNSAFE_RAW);
   $email=filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL);
   $message=filter_input(INPUT_POST, "message",FILTER_UNSAFE_RAW);

   if (!$firstname || !$surname || !$email || !$message) {
    $msg ="ok";

   } else {
    $stm = $conexao->prepare('INSERT INTO contato (firstname,surmane,email,message) VALUES (:firstname,:surname,:email,:message');
    $stm->bindParam('firstname', $firstname);
    $stm->bindParam('surname', $surname);
    $stm->bindParam('email', $email);
    $stm->bindParam('message', $message);
    $stm->execute();

    $msg = "submit NOT!";
   
  }
}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORMULARY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <form method="POST" class="col-6 mx-auto mt-4 border border-4 p-4 rounded-4" action="">  
      <h3 class="text-center" >FORMULARY</h3>
  <div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label fw-bold">firt name</label>
  <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="your name" required >
</div>
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label fw-bold">Surname</label>
  <input type="text" name="surname"  class="form-control" id="exampleFormControlInput1" placeholder="your Surname"required >
</div>
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label fw-bold">Email address</label>
  <input type="email" name= "email" class="form-control fs-6 " id="exampleFormControlInput1" placeholder="name@example.com"required >
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1"  class="form-label fw-bold ">Message</label>
  <textarea name="message"  class="form-control" id="exampleFormControlTextarea1" required rows="3"></textarea>
</div>
<button type="submit" class="btn btn-primary btn-lg rounded-4 ">Submite</button>
</form>
<div class="msg text-center ">
<?=$msg?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
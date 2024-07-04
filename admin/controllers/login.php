<?php
require_once('../database/db.php');
$error=null;
if(isset($_POST['login'])){
   $mail=htmlspecialchars($_POST['email']);
   $password=htmlspecialchars($_POST['password']);
   //Connect the user with their name or email
   if(empty($_POST['email']) || empty($_POST['password'])){
      $error ="Veillez completer tous les champs";
   }

   else{
      $request = $db->prepare("SELECT username,password FROM admins WHERE username = :username ");
      $request->bindValue(':username', $mail);
      $request->execute();
      $admin = $request->fetch(PDO::FETCH_ASSOC);
      if($admin){
         if (password_verify($password,$admin['password'])) {
            $_SESSION['admin']=$admin;
            header("location: index.php");
            exit;
         }
         else{
            $error ="Nom d'utilisateur ou mot de passe incorrect";
         }
      } else {
         $error = "Nom d'utilisateur ou mot de passe incorrect";
      }
   }

}

?>
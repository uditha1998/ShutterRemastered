<?php
class Validation{

     public function emptySignupInput( $user , $email , $password , $repeatPassword){
      
         if( !empty($$user) || !empty($email) || !empty($password) || !empty($repeatPassword) ){
             return true;
         }else{
             return false;
         } 
     }

     public function emptySigninInput( $email , $password ){
      
        if( !empty($email) && !empty($password) ){
            return true;
        }else{
            return false;
        } 
    }

    public function passwordLength( $password ){
      
        if( strlen($password) > 5 && strlen($password) < 15 ){
            return true;
        }else{
            return false;
        } 
    }

    public function passwordMatch( $password1 , $password2){
      
        if( $password1 === $password2){
            return true;
        }else{
            return false;
        } 
    }
}
?>
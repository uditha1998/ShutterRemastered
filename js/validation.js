
function sign_up(email,password,repeatpassword){
//   console.log (email);
//   console.log (password);
//   console.log (repeatpassword);
        if( email==='' && password==='' && repeatpassword===''){
            alert('Fill the all filde');
        }else if(email===''){
            alert('Fill the email');
        }else if(password===''){
            alert('Fill the password');
        }else if(repeatpassword===''){
            alert('Fill the repeat password');
        }else if(password.length < 5 || password.length > 15){
            alert('Enter password more than 5 leters and less than 15 leters');
        }else if( password != repeatpassword){
            alert('Password did not match');
        }
        
    }


    
function sign_in(email,password){
   // console.log (email);
   // console.log (password);
    if( email==='' && password===''){
        alert('Fill the email and password');
    }else if( email==='' ){
        alert('Fill the email ');
    }else if( password===''){
             alert('Fill the  password');
    }
}
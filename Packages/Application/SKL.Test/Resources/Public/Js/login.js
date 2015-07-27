$(document).ready(function(e) {

  /**
   * When user click on register button if there's no information fill, there will be a message error occured
   * User can register successfully if they fill in all requirement in our form
   */

  var error = $('#messageError');
  $('#registerButton').on("click",function(e) {

    var name = $('#name').val();
    var password = $('#password').val();
    var confirmPassword = $('#confirmPassword').val();
    var email = $('#email').val();

    error.fadeIn("slow");
    // if (name === '' && password === '' && confirmPassword === '' && email === '') {
    //   error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, Password, Email</strong> are empty. <strong>Please</strong> fill in these information')
    //   e.preventDefault();
    // }
    if (name === '') {
      if(password === '') {
        if (confirmPassword === '') {
          if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, Password, confirmPassword, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, Password, confirmPassword</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }else {
          if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, Password, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, Password</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }
      }else {
        if (confirmPassword === '') {
          if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, ConfirmPassword, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name ,ConfirmPassword</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }else {
          if (password != confirmPassword) {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Confirm password</strong> is not match with password. <strong>Please</strong> change it! ')
            e.preventDefault();
          }else if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name</strong> is empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }
      }
    }else {
      if(password === '') {
        if (confirmPassword === '') {
          if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Password, confirmPassword, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Password, confirmPassword</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }else {
          if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Password, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Password</strong> is empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }
      }else {
        if (confirmPassword === '') {
          if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>ConfirmPassword, Email</strong> are empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>ConfirmPassword</strong> is empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }
        }else {
          if (password != confirmPassword) {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Confirm password</strong> is not match with password. <strong>Please</strong> change it! ')
            e.preventDefault();
          }else if (email === '') {
            error.html('<i class="fa fa-exclamation-circle"></i> <strong>Email</strong> is empty. <strong>Please</strong> fill in these information')
            e.preventDefault();
          }else {
              
          }
        }
      }
    }




  });

  $('#loginButton').on("click",function(e) {
    var name = $('#name').val();
    var password = $('#password').val();

    error.show();

    if (name == '') {
      if (password == '') {
        error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name</strong> and <strong>Password</strong> are empty. <strong>Please</strong> fill in these information')
        e.preventDefault();
      }else {
        error.html('<i class="fa fa-exclamation-circle"></i> <strong>Name</strong> is empty. <strong>Please</strong> fill in these information')
        e.preventDefault();
      }
    }else {
      if (password == '') {
        error.html('<i class="fa fa-exclamation-circle"></i> <strong>Password</strong> is empty. <strong>Please</strong> fill in these information')
        e.preventDefault();
      }else {

      }
    }

  });

});

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Users App</title>
</head>

<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>Form</h2>
                <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="index.php" method="post" >

            <!-- Name  -->
                <div class="mb-3">
                    <label for="validName" class="form-label">Name</label>
                    <input type="text" class="form-control" value=""
                     placeholder="enter your name" name="name" id="validName" aria-describedby="validNameFeedback"
                        autocomplete="false" required>
                        <div  id="validNameFeedback" class="invalid-feedback">
                         Name must not be less than 3 characters long and must be alphabetical.
                    </div>
                </div>
            <!-- Email  -->
                <div class="mb-3">
                    <label for="validEmail" class="form-label">Email</label>
                    <input type="email" class="form-control " value=""
                          placeholder="Enter your email" name="email"
                         id="validEmail" autocomplete="false" required>
                    <div id="emailFeedback" class="invalid-feedback">
                      Please enter a valid email address.
                     </div>
                </div>
            <!-- Mobile  -->
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="number" class="form-control"  value=""
                    placeholder="enter your phone number" name="mobile" id="validTel"
                        autocomplete="false" required>
                        <div id="telFeedback" class="invalid-feedback">
                        The phone number must contain exactly 8 digits.
                     </div>
                </div>
            <!-- Password -->
            <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group">
        <input type="password" class="form-control" value=""
            placeholder="password" name="password" id="validPassword"
            autocomplete="false" required>
        <div class="input-group-append">
            <span class="input-group-text" id="togglePassword">
                <i data-feather="eye-off"></i>
            </span>
        </div>
    </div>
</div>
                <div id="pswFeedback" class="invalid-feedback">
                Please enter a valid password. (e.g., at least 8 characters, uppercase, digits, special characters).
                </div>
            <!-- Confirm Password -->
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" value=""
                     placeholder="confirm password" name="confirmPassword" id="validConfirmPassword"
                     autocomplete="false" required>
                </div>
                <div id="confirmPswFeedback" class="invalid-feedback">
                      Please confirm your password. (Must match the password field)
                </div>

                <!-- Checkbox -->
                <div class="mb-3">
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Activated
        </label>
      </div>
    </div>
  </div>

<!-- select -->
  <div class="mb-3">
  <label class="form-label" for="inlineFormCustomSelectPref">Role</label>
  <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>


                <input type="hidden" name="id" value="">
                


            
                <input type="submit" class="btn btn-primary" value="Save" name="save">
            </form>
        </div>

    </div>
    


<!-- **************************************Validation -->

<script>
    // Récupérer l'élément input
    var nameInput = document.getElementById("validName");
    var emailInput = document.getElementById("validEmail");
    var telInput= document.getElementById("validTel");
    var passwordInput = document.getElementById("validPassword");
    var confirmPasswordInput = document.getElementById("validConfirmPassword");


    // Récupérer l'élément de rétroaction d'invalidité
    var feedback = document.getElementById("validNameFeedback");
    var emailFeedback = document.getElementById("emailFeedback");
    var telFeedback = document.getElementById("telFeedback");
    var pswFeedback = document.getElementById("pswFeedback");
    var confirmPswFeedback = document.getElementById("confirmPswFeedback");

    var regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var regex = /^[A-Za-z]+$/;
    var telPattern = /^\d{8}$/;
    var pswPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;


    // Ajouter un gestionnaire d'événements pour le changement d'état de validité
    nameInput.addEventListener("input", function () {
        if (nameInput.value.length >= 3) {
            if (regex.test(nameInput.value)) {
                nameInput.classList.remove("is-invalid");
                feedback.style.display = "none";
            } else {
                nameInput.classList.add("is-invalid");
                feedback.style.display = "block";
            }
        } else {
            nameInput.classList.add("is-invalid");
            feedback.style.display = "block";
        }
    });

    emailInput.addEventListener("input", function() {
            if (regexEmail.test(emailInput.value)) {
                emailInput.classList.remove("is-invalid");
                emailFeedback.style.display = "none";
                return false;
            } else {
                emailInput.classList.add("is-invalid");
                emailFeedback.style.display = "block";
                return true;
            }
        });

        telInput.addEventListener("input", function () {
        if (telPattern.test(telInput.value)) {
            telInput.classList.remove("is-invalid");
            telFeedback.style.display = "none";
        } else {
            telInput.classList.add("is-invalid");
            telFeedback.style.display = "block";
        }
    });

    passwordInput.addEventListener("input", function () {
                if (pswPattern.test(passwordInput.value)) {
                    passwordInput.classList.remove("is-invalid");
                    pswFeedback.style.display = "none";
                } else {
                    passwordInput.classList.add("is-invalid");
                    pswFeedback.style.display = "block";
                }
            });

    confirmPasswordInput.addEventListener("input", function () {
        if (confirmPasswordInput.value === passwordInput.value) {
            confirmPasswordInput.classList.remove("is-invalid");
            confirmPswFeedback.style.display = "none";
        } else {
            confirmPasswordInput.classList.add("is-invalid");
            confirmPswFeedback.style.display = "block";
        }
    });

     // Récupérer l'icône d'œil et le bouton pour basculer la visualisation du mot de passe
     var togglePasswordIcon = document.getElementById("togglePassword");
    var isPasswordVisible = false;
    togglePasswordIcon.addEventListener("click", function () {
        if (isPasswordVisible) {
            // Si le mot de passe est visible, masquer le texte du mot de passe
            passwordInput.type = "password";
            confirmPasswordInput.type = "password";
            isPasswordVisible = false;
            togglePasswordIcon.innerHTML = '<i data-feather="eye-off"></i>';
        } else {
            // Si le mot de passe est masqué, afficher le texte du mot de passe
            passwordInput.type = "text";
            confirmPasswordInput.type = "text";
            isPasswordVisible = true;
            togglePasswordIcon.innerHTML = '<i data-feather="eye"></i>';
        }
        
        // Rechargez les icônes Feather après la modification
        feather.replace();
    });
</script>



<script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script>
        feather.replace()
    </script>

</body>

</html>
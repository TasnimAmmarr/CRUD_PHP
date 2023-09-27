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
                    <input type="tel" class="form-control"  value=""
                    placeholder="enter your phone number" name="mobile"
                        autocomplete="false">
                </div>
            <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control"  value=""
                    placeholder="password" name="password"
                        autocomplete="false">
                </div>
                

                    <input type="hidden" name="id" value="">
                


            
                <input type="submit" class="btn btn-primary" value="Save" name="save">
            </form>
        </div>

    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script>
        feather.replace()
    </script>



<!-- **************************************Validation -->

<script>
    // Récupérer l'élément input
    var nameInput = document.getElementById("validName");
    var emailInput = document.getElementById("validEmail")

    // Récupérer l'élément de rétroaction d'invalidité
    var feedback = document.getElementById("validNameFeedback");
    var emailFeedback = document.getElementById("emailFeedback");

    var regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var regex = /^[A-Za-z]+$/;


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

    // Ajout d'un gestionnaire d'événements "input" pour la validation en temps réel
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
</script>
</body>

</html>
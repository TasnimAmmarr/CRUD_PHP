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
                <div class="mb-3">
                    <label for="validName" class="form-label">Name</label>
                    <input type="text" class="form-control is-invalid" value=""
                     placeholder="enter your name" name="name" id="validName" aria-describedby="validNameFeedback"
                        autocomplete="false" required>
                        <div  id="validNameFeedback" class="invalid-feedback">
                         Name must not be less than 3 characters long and must be alphabetical.
                    </div>


                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control"  value=""
                     placeholder="enter your email" name="email"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="tel" class="form-control"  value=""
                    placeholder="enter your phone number" name="mobile"
                        autocomplete="false">
                </div>
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

    // Récupérer l'élément de rétroaction d'invalidité
    var feedback = document.getElementById("validNameFeedback");

    // Ajouter un gestionnaire d'événements pour le changement d'état de validité
    nameInput.addEventListener("input", function () {
        // Vérifier si la longueur du contenu est supérieure à 3 caractères
        if (nameInput.value.length >= 3) {
            // Vérifier si le contenu est alphabétique
            var regex = /^[A-Za-z]+$/; // Expression régulière pour les caractères alphabétiques
            if (regex.test(nameInput.value)) {
                // Si le contenu est alphabétique, supprimer la classe is-invalid
                nameInput.classList.remove("is-invalid");
                // Cacher la rétroaction d'invalidité en supprimant la classe d'affichage
                feedback.style.display = "none";
            } else {
                // Si le contenu n'est pas alphabétique, ajouter la classe is-invalid
                nameInput.classList.add("is-invalid");
                // Afficher la rétroaction d'invalidité en ajoutant la classe d'affichage
                feedback.style.display = "block";
            }
        } else {
            // Si la longueur du contenu est inférieure ou égale à 3 caractères, ajouter la classe is-invalid
            nameInput.classList.add("is-invalid");
            // Afficher la rétroaction d'invalidité en ajoutant la classe d'affichage
            feedback.style.display = "block";
        }
    });
</script>
</body>

</html>
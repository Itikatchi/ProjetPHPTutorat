<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Accueil Étudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
          rel="stylesheet">
    <style>  label {
              display: block;
              font-weight: bold;
              margin-bottom: 5px;
              }

              input, textarea {
              width: 100%;
              padding: 7px;
              border: 1px solid #ccc;
              border-radius: 2px;
              font-size: 12px;
              }

              textarea {
              resize: vertical;
              height: 40px;
              }
              .ModifContainer{
                 font-size: 12px;
              }
    </style>
</head>
<body>
<div class="MainContainer">
    <div class="ModifContainer">
    <h1>Modifier les Informations</h1>
    <form action="/save" method="POST" >
        <!-- Informations Étudiant -->
        <div class="form-group">
            <label for="student-name">Nom de l'étudiant</label>
            <input type="text" id="student-name" name="student_name" value="Paul Durand">
        </div>
        <div class="form-group">
            <label for="student-address">Adresse</label>
            <div class="row">
                <div class="form-group">
                    <label for="student-street">Rue</label>
                    <input type="text" id="student-street" name="student_street" value="10 rue de Paris">
                </div>
                <div class="form-group">
                    <label for="student-postal-code">Code Postal</label>
                    <input type="text" id="student-postal-code" name="student_postal_code" value="75001">
                </div>
                <div class="form-group">
                    <label for="student-city">Ville</label>
                    <input type="text" id="student-city" name="student_city" value="Paris">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="student-email">Email</label>
            <input type="email" id="student-email" name="student_email" value="paul.durand@example.com">
        </div>
        <div class="form-group">
            <label for="student-class">Classe</label>
            <input type="text" id="student-class" name="student_class" value="3CSI">
        </div>

        <!-- Informations Entreprise -->
        <div class="form-group">
            <label for="company-name">Nom de l'entreprise</label>
            <input type="text" id="company-name" name="company_name" value="EDF">
        </div>
        <div class="form-group">
            <label for="company-address">Adresse</label>
            <input type="text" id="company-address" name="company_address" value="1 rue val 75001 Paris">
        </div>
        <div class="form-group">
            <label for="company-contact-name">Nom du contact</label>
            <input type="text" id="company-contact-name" name="company_contact_name" value="Jean Dupont">
        </div>
        <div class="form-group">
            <label for="company-phone">Téléphone</label>
            <input type="tel" id="company-phone" name="company_phone" value="0123456789">
        </div>
        <div class="form-group">
            <label for="company-email">Email</label>
            <input type="email" id="company-email" name="company_email" value="jean.dupont@example.com">
        </div>

        <!-- Sujet de Mémoire -->
        <div class="form-group">
            <label for="thesis-subject">Sujet de mémoire</label>
            <textarea id="thesis-subject" name="thesis_subject">L'étudiant n'a pas encore de sujet !</textarea>
        </div>

        <!-- Actions -->
        <div class="actions">
            <button type="submit" class="btn-save">Enregistrer</button>
            <button type="button" class="btn-cancel" onclick="window.history.back()">Annuler</button>
        </div>
    </form>

    </div>

</div>
</body>
</html>

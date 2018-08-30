<body>
  <h1>Ajouter un contact</h1>
  <div id="div_notif_success" style="color:green; text-align:center;"></div>
  <div id="div_notif_echec" style="color:red; text-align:center;"></div>
  <div>
    <form action="controleur/ajout_contact.php" method="POST">
      <table align="center">
        <tr>
          <td colspan="2" style="text-align: center;">INFORMATIONS CONTACT</td>
        </tr>
        <tr>
          <td style="width:30%">Nom</td>
          <td style="width:70%"><input type="text" name="nom" maxlength="50"></td>
        </tr>
        <tr>
          <td style="width:30%">Prénom</td>
          <td style="width:70%"><input type="text" name="prenom" maxlength="50"></td>
        </tr>
        <tr>
          <td style="width:30%">Email</td>
          <td style="width:70%"><input type="email" name="email" id="email" maxlength="50">  <button id="verif_mail" value="val_1" >Vérifier</button> </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center;">ADRESSE CONTACT</td>
        </tr>
        <tr>
          <td style="width:30%">Numéro et rue </td>
          <td style="width:70%"><input type="text" name="numero_et_rue" maxlength="100"></td>
        </tr>
        <tr>
          <td style="width:30%">Code postal</td>
          <td style="width:70%"><input type="text" name="code_postal" maxlength="10"></td>
        </tr>
        <tr>
          <td style="width:30%">Ville</td>
          <td style="width:70%"><input type="text" name="ville" maxlength="50"></td>
        </tr>
        <tr>
          <td style="width:30%">Pays</td>
          <td style="width:70%"><input type="text" name="pays" maxlength="50"></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center;"><input type="submit" style="width:30%" value="Enregistrer"></td>
        </tr>
      </table>
    </form>
  </div>
</body>
<style>
table {
    border-collapse: collapse;
    width: 50%;
}
th {
    border: thin solid #aaa;
    width: 50%;
    padding: 5px;
    background-color: #ccc;
}
td {
    border: thin solid #aaa;
    width: 50%;
    padding: 5px;
    text-align: left;
}
input {
    width: 80%;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
$("#verif_mail").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "../CRM_LBC/ajax/test_email.php",
        data: { 
            email: $("#email").val() // < note use of 'this' here
        },
        success: function(data) {
          if(data[0].correct==1)
            $("#div_notif_success").html(data[0].message);
          else
            $("#div_notif_echec").html(data[0].message);

        },
        error: function(result) {
            alert("L'adresse email n'a pas pu être vérifiée");
        }
    });
});
</script>

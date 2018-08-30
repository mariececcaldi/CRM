<body>
  <h1>Modifier les infos de <?php echo $contact_a_modifier->prenom() .' '. $contact_a_modifier->nom() ?></h1>
  <div id="div_notif_success" style="color:green; text-align:center;"></div>
  <div id="div_notif_echec" style="color:red; text-align:center;"></div>
  <div>
    <form action="controleur/modifie_contact.php" method="POST">
      <input type="hidden" name="contact_id"  value="<?php echo $contact_a_modifier->contact_id() ?>">
      <input type="hidden" name="user_id"  value="<?php echo $contact_a_modifier->user_id() ?>">
      <table align="center">
        <tr>
          <td style="width:30%">Nom </td>
          <td style="width:70%"><input type="text" name="nom" maxlength="50" value="<?php echo $contact_a_modifier->nom() ?>"></td>
        </tr>
        <tr>
          <td style="width:30%">Prénom</td>
          <td style="width:70%"><input type="text" name="prenom" maxlength="50" value="<?php echo $contact_a_modifier->prenom() ?>"></td>
        </tr>
        <tr>
          <td style="width:30%">Email</td>
          <td style="width:70%"><input type="email" name="email" id="email" maxlength="50" value="<?php echo $contact_a_modifier->email() ?>">  <button id="verif_mail" value="val_1" >Vérifier</button> </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center;"><input type="submit" style="width:30%" value="Enregistrer"></td>
        </tr>
      </table>
    </form>
  </div>
  
  <div>
  <h2>Les adresses de <?php echo $contact_a_modifier->prenom() .' '. $contact_a_modifier->nom() ?></h2>
  <a href="index.php?action=ajouter_adresse&contact_id=<?php echo $contact_a_modifier->contact_id() ?>">Ajouter une adresse</a>
    <table align="center">
      <tr>
        <th width="30%">Rue </th>
        <th width="20%">Code postal </th>
        <th width="20%">Ville </th>
        <th width="20%">Pays </th>
        <th width="10%"> </th>
      </tr>
      <?php foreach($adresses_contact_a_modifier as $adresse_contact)
      {
        ?>
      <tr>
          <td><?php echo $adresse_contact->numero_et_rue() ?></td>
          <td><?php echo $adresse_contact->code_postal() ?></td> 
          <td><?php echo $adresse_contact->ville() ?></td>
          <td><?php echo $adresse_contact->pays() ?></td>
          <td><a href="index.php?action=modifier_adresse&adresse_id=<?php echo $adresse_contact->adresse_id() ?>">Modifier</a></td>
        </tr>
	        <?php
        }
        ?>
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
    padding: 5px;
    background-color: #ccc;
}
td {
    border: thin solid #aaa;
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

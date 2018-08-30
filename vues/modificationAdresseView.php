<body>
  <h1>Modifier l'adresse</h1>
  <div>
    <form action="controleur/modifie_adresse.php" method="POST">
      <input type="hidden" name="contact_id"  value="<?php echo $adresse_a_modifier->contact_id() ?>">
      <input type="hidden" name="adresse_id"  value="<?php echo $adresse_a_modifier->adresse_id() ?>">
      <table align="center">
        <tr>
          <td style="text-align:left;width:30%">Numéro et rue</td>
          <td style="text-align:left;width:70%"><input type="text" name="numero_et_rue" maxlength="50" value="<?php echo $adresse_a_modifier->rue() ?>"></td>
        </tr>
        <tr>
          <td style="text-align:left;width:30%">Code postal</td>
          <td style="text-align:left;width:70%"><input type="text" name="code_postal" maxlength="50" value="<?php echo $adresse_a_modifier->code_postal() ?>"></td>
        </tr>
        <tr>
          <td style="text-align:left;width:30%">Ville</td>
          <td style="text-align:left;width:70%"><input type="text" name="ville" maxlength="50" value="<?php echo $adresse_a_modifier->ville() ?>"></td>
        </tr>
        <tr>
          <td style="text-align:left;width:30%">Pays</td>
          <td style="text-align:left;width:70%"><input type="text" name="pays" maxlength="50" value="<?php echo $adresse_a_modifier->pays() ?>"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" style="width:30%" value="Enregistrer"></td>
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
    text-align: center;
}
input {
    width: 80%;
}

</style>
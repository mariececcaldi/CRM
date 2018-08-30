<body>
  <h1>Ajouter une adresse</h1>
  <div>
    <form action="controleur/ajout_adresse.php" method="POST">
      <input type="hidden" name="contact_id" value="<?php echo $_GET['contact_id'] ?>">
      <table align="center">
        <tr>
          <td style="width:30%">Numéro et rue</td>
          <td style="width:70%"><input type="text" name="numero_et_rue" maxlength="100"></td>
        </tr>
        <tr>
          <td style="width:30%">Code postal</td>
          <td style="width:70%"><input type="text" name="code_postal" maxlength="10"></td>
        </tr>
        <tr>
          <td style="width:30%">Ville</td>
          <td style="width:70%"><input type="test" name="ville" maxlength="50"></td>
        </tr>
        <tr>
          <td style="width:30%">Pays</td>
          <td style="width:70%"><input type="test" name="pays" maxlength="50"></td>
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

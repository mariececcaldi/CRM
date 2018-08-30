<body>
  <h1>Ma liste de contacts</h1>
  <a href="index.php?action=ajouter_contact">Ajouter un contact</a>
  <div>
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Adresses</th>
        <th></th>
      </tr>
      <?php foreach($mes_contacts as $contact)
      {
          ?>
      <tr>
        <td><?php echo $contact['contact']->nom() ?></td>
        <td><?php echo $contact['contact']->prenom() ?></td>
        <td><?php echo $contact['contact']->email() ?></td>
        <td>
        <?php
        foreach($contact['adresses'] as $adresse)
        {
            echo $adresse->numero_et_rue() .', '. $adresse->code_postal() .' '. ucfirst($adresse->ville()).', '. ucfirst($adresse->pays()). '<br>' ;
        }
        ?>
        </td>
        <td><a href="index.php?action=modifier_contact&contact_id=<?php echo $contact['contact']->contact_id() ?>">Modifier</a></td>
      </tr>
          <?php
      }
      ?>
    </table>
  </div>
</body>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th {
    border: thin solid #aaa;
    width: 20%;
    padding: 5px;
    background-color: #ccc;
}
td {
    border: thin solid #aaa;
    width: 20%;
    padding: 5px;
    text-align: center;
}
tr:nth-child(odd) {
    background-color: #f2f2f2
}

</style>

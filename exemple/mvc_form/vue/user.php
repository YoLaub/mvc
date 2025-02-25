

<h1>CLIENTS</h1>

<form method="POST" action="?user&update">

	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Prénom</th>
		  <th scope="col">Nom</th>
		  <th scope="col">Email</th>
		  <th scope="col">Né(e) le</th>
		  <th scope="col">Ville</th>
		  <th scope="col">Enfant(s)</th>
		  <th scope="col">Téléphone</th>
		</tr>
	  </thead>
	  <tbody>

<?php	
	// on scanne le tableau stocké sur $user :
	foreach ($user as  $data) {
?>
	<tr>
	  <th scope="row"><?= $data['id'] ?></th>
	  <td> <input type="text" class="form-control" value="<?= $data['prenom'] ?>" name="<?= $data['id'].'_u_prenom' ?>" size="5" /> </td>
	  <td> <input type="text" class="form-control" value="<?= $data['nom'] ?>" name="<?= $data['id'].'_u_nom' ?>" size="5" /> </td>
	  <td> <input type="text" class="form-control" value="<?= $data['email'] ?>" name="<?= $data['id'].'_u_email' ?>" size="5" /> </td>
	  <td> <input type="text" class="form-control" value="<?= $data['ne_le'] ?>" name="<?= $data['id'].'_u_born' ?>" size="5" /> </td>
	  <td> <input type="text" class="form-control" value="<?= $data['ville'] ?>" name="<?= $data['id'].'_u_ville' ?>" size="5" /> </td>
	  <td> <input type="text" class="form-control" value="<?= $data['enfants'] ?>" name="<?= $data['id'].'_u_enfants' ?>" size="5" /> </td>
	  <td> <input type="text" class="form-control" value="<?= $data['tel'] ?>" name="<?= $data['id'].'_u_tel' ?>" size="5" /> </td>
	</tr>
<?php 
		//fin de l'itération :
		}
?>
	  </tbody>
	</table>

	<br />

	<center>

		<button id='update'>UPDATE</button>

		<br /><br />

		<div id="info"></div>

	</center>

</form>
	
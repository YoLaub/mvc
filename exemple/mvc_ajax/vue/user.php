

<h1>CLIENTS</h1>

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

<?php include( ROOT . 'vue/userTable.php') ?>
  
  </tbody>
</table>

<br />

<center>

	<button id='update'>UPDATE</button>

	<br /><br />

	<div id="info"></div>

</center>

<script>

$(function(){

	$("#update").on("click", function() {

		$("#update").prop("disabled",true);
		$("#info").show();
		$("#info").html("Traitement...");
	
		let data = {
			<?= rtrim($JS_data, ',') ?>
		};

		$.ajax({
			//on recharge http://mvc/?user avec le paramètre update ! (&update)
			url:'?user&update',
			type:'POST',
			data: data,
			error: function() {
				alert('Erreur sur PHP !');
			},
			success: function(data) {
				if (data === 'err') {
					$('#content').html("Erreur de traitement !");
				} else {
					$('#content').html(data);
					$("#info").html("Mise à jour OK !");
					//alert(data);
				}
			},
			complete: function() {
				
				$("#update").prop("disabled",false);
				setTimeout(function() { 
					$("#info").hide();
				}, 2000);
				
			}

		});
		
	});

})

</script>
	
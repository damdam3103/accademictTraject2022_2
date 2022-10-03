<?php

use Mpdf\Mpdf;

require_once 'vendor/autoload.php';

$mpdf = new Mpdf();


$mysqli = new mysqli("database", "lamp", "lamp", "lamp");

$sql = '
	select * 
	from post
	order by id desc 
';
$result = $mysqli->query($sql);
$posts = $result->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="nl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Fake Fb</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Fake FB</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="createPost.php">Create post</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container mt-3">
	<?php foreach ($posts as $post) { ?>
		<div class="card mb-2">
			<div class="card-body">
				<h5 class="card-title"><?= $post['title'] ?></h5>
				<p class="card-text"><?= $post['message'] ?></p>
				<a href="#" onclick="likePost2(<?= $post['id'] ?>)"  class="card-link text-decoration-none text-dark"><i
							class="bi bi-hand-thumbs-up"></i>: <?= $post['likes'] ?> like
					this</a>
			</div>
		</div>
	<?php } ?>
</div>
<script>
	function likePost2(id){
		let form = new FormData();
		form.append('id', id);
		form.append('type', 'unlike')
		const options = {
			method: 'POST',
			body: form
		}
		fetch('/likePost.php', options)
			.then((rd) => {
				location.reload();
			console.log(rd);
		}).catch((err) => {
			console.log(err);
		});
	}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
		crossorigin="anonymous"></script>
</body>
</html>




<script>
	function likePost(id) {
		const form = new FormData();
		form.append('id', id);
		const options = {
			method: 'POST',
			body: form
		}
		fetch('/likePost.php', options).then(() => {
			location.reload();
		});
	}
</script>


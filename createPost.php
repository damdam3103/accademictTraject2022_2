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
</head>
<body class="bg-dark text-light">
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
					<a class="nav-link" aria-current="page" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="/post/create">Create post</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container mt-3">
	<form method="post" action="/post/add">
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="text" name="title" class="form-control" id="title">
		</div>
		<div class="mb-3">
			<label for="message" class="form-label">Message</label>
			<textarea class="form-control" name="message" id="message" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Verstuur</button>
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
		crossorigin="anonymous"></script>
</body>
</html>


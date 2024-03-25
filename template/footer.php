<head>
	<!-- css links -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>


	<div class="footer">

		<div class="col-6">&copy; Inventory Management System - <span id="current_year"></span>  - All Rights Reserved</div>

		<a href="#"><img src="img/plane-up-solid.svg" alt="plane"></a>

	</div>


	<script>
		const d = new Date();
		let year = d.getFullYear();
		document.getElementById("current_year").innerHTML = year;
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
	<!-- javascript links -->
	<script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>

	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
</body>
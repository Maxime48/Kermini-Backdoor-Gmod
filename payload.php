<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<style>
		.register-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.register-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.register-form input[type="number"],
		.register-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.register-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
		</style>
	</head>
	<body>
		<div class="register-form">
			<h1>Payload update/creation</h1>
			<form action="register.php" method="post">
				<input type="number" name="username" placeholder="Server id" required>
				<input type="text" name="password" placeholder="Lua code" required>
				<input type="number" name="email" placeholder="How Many times ?" required>
				<input type="submit">
			</form>
		</div>
	</body>
</html>
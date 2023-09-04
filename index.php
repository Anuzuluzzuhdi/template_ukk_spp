<!-- <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <title>Login Siswa - Aplikasi Pembayaran SPP</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body> -->

    <!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="login.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="proses-login-siswa.php" method="post">
					<label for="chk" aria-hidden="true">Login Siswa</label>
					<!-- <input type="text" name="txt" placeholder="User name" required=""> -->
					<input type="text" name="nisn" placeholder="Masukkan NISN" required="">
					<input type="text" name="nis" placeholder="Masukkan NIS" required="">
					<button>Login</button>
				</form>
			</div>

			<div class="login">
            <form action="proses-login-petugas.php" method="post">
					<label for="chk" aria-hidden="true">Admin/Petugas</label>
					<input type="text"  name="username" placeholder="Masukan Username" required>
					<input type="password" name="password" placeholder="Masukan Password" required>
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>

    <!-- <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="text-center">LOGIN SISWA</h4>
                <div class="card">
                    <div class="card-header">
                        <img src="logo.png" width="100%">
                    </div>
                    <div class="card-body">
                        <form action="proses-login-siswa.php" method="post">
                            <div class="form-group mb-2">
                                <label>NISN</label>
                                <input type="number" C class="form-control" placeholder="Masukan NISN anda.." required>
                            </div>
                            <div class="form-group mb-2">
                                <label>NIS</label>
                                <input type="number" name="nis" class="form-control" placeholder="Masukan NIS anda.." required>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary"> LOGIN</button>
                            </div>
                            <a href="index2.php"> Login Sebagai Administrator</a>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- </div> -->


    <!-- <script src="js/bootstrap.bundle.min.js"></script>
        
    </body>

</html> -->
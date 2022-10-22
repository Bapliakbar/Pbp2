<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){    
    $nip = mysqli_real_escape_string($conn, $_POST['nip']);
    $nama_kar = mysqli_real_escape_string($conn, $_POST['nama_kar']);
	$total_gaji= mysqli_real_escape_string($conn, $_POST['total_gaji']);

    $query = "SELECT * FROM tb_gaji WHERE nama_kar = '$nama_kar' && nip = '$nip' && total_gaji = '$total_gaji'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)){
        $error[] = 'data already exist!';
    }else{
        $insert = " INSERT INTO tb_gaji(nama_kar, nip, total_gaji) VALUES ('$nama_kar', '$nip', '$total_gaji')";
        mysqli_query($conn, $insert);
        header('location:gaji_karyawan.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard Mahasiswa</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

<div class="dashboard">
	<aside class="search-wrap">
		<div class="search">
			<!-- <label for="search">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input type="text" id="search">
			</label> -->
		</div>
		
		<div class="user-actions">
      <?php echo $_SESSION['user_name'] ?>
			<button>
            <a href="#" class="btn">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.094 2.085l-1.013-.082a1.082 1.082 0 0 0-.161 0l-1.063.087C6.948 2.652 4 6.053 4 10v3.838l-.948 2.846A1 1 0 0 0 4 18h4.5c0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5H20a1 1 0 0 0 .889-1.495L20 13.838V10c0-3.94-2.942-7.34-6.906-7.915zM12 19.5c-.841 0-1.5-.659-1.5-1.5h3c0 .841-.659 1.5-1.5 1.5zM5.388 16l.561-1.684A1.03 1.03 0 0 0 6 14v-4c0-2.959 2.211-5.509 5.08-5.923l.921-.074.868.068C15.794 4.497 18 7.046 18 10v4c0 .107.018.214.052.316l.56 1.684H5.388z"/></svg>
            </a>
         </button>
			<button>
            <a href="logout.php">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z"/><path d="M11 2h2v10h-2z"/></svg>
            </a>
         </button>
		</div>
	</aside>
	
	<header class="menu-wrap">
		<figure class="user">
			<h1>BPYD</h1>
		</figure>
	
		<nav>
			<section class="dicover">
				<h3>Dashboard</h3>
				<h3 style="margin-top: 30px ;">DATA</h3>
				
				<ul>
               		<li>
						<a href="karyawan.php">  
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z"/></svg>
                	KARYAWAN
						</a>
					</li>
				</ul>
				<ul>
               		<li>
						<a href="gaji_karyawan.php">  
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 12h2v3h-2z"/><path d="M21 7h-1V4a1 1 0 0 0-1-1H5c-1.206 0-3 .799-3 3v11c0 2.201 1.794 3 3 3h16a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM5 5h13v2H5.012C4.55 6.988 4 6.805 4 6s.55-.988 1-1zm15 13H5.012C4.55 17.988 4 17.805 4 17V8.833c.346.115.691.167 1 .167h15v9z"/></svg>
                	GAJI KARYAWAN
						</a>
					</li>
				</ul>
			</section>
		
			 <!-- <section class="tools">
				<h3>Tools</h3>
				
				<ul>
					<li>
						<a href="#" class="active">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
							Search
						</a>
					</li>
					
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13 7L11 7 11 11 7 11 7 13 11 13 11 17 13 17 13 13 17 13 17 11 13 11z"/><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z"/></svg>
							Create portfolio
						</a>
					</li>
					
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-1 14H4V9.227l7.335 6.521a1.003 1.003 0 0 0 1.33-.001L20 9.227V18zm0-11.448l-8 7.11-8-7.111V6h16v.552z"/></svg>
							Messages
						</a>
					</li>
				</ul>
			</section>
			
			<section class="dicover">
				<h3>Finance</h3>
				
				<ul>
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20,9l-4-4v3H9c-2.757,0-5,2.243-5,5s2.243,5,5,5h3v-2H9c-1.654,0-3-1.346-3-3s1.346-3,3-3h7v3L20,9z"/></svg>
							Buy
						</a>
					</li>
					
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15,8H8V5L4,9l4,4v-3h7c1.654,0,3,1.346,3,3s-1.346,3-3,3h-3v2h3c2.757,0,5-2.243,5-5S17.757,8,15,8z"/></svg>
							Sell
						</a>
					</li>
					
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21,3h-4V2h-2v1H9V2H7v1H3C2.447,3,2,3.447,2,4v17c0,0.553,0.447,1,1,1h18c0.553,0,1-0.447,1-1V4C22,3.447,21.553,3,21,3z M7,5v1h2V5h6v1h2V5h3v3H4V5H7z M4,20V10h16v10H4z"/><path d="M11,15.586l-1.793-1.793l-1.414,1.414l2.5,2.5C10.488,17.902,10.744,18,11,18s0.512-0.098,0.707-0.293l5-5l-1.414-1.414 L11,15.586z"/></svg>
							Invoice
						</a>
					</li>
					
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 12h2v3h-2z"/><path d="M21 7h-1V4a1 1 0 0 0-1-1H5c-1.206 0-3 .799-3 3v11c0 2.201 1.794 3 3 3h16a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM5 5h13v2H5.012C4.55 6.988 4 6.805 4 6s.55-.988 1-1zm15 13H5.012C4.55 17.988 4 17.805 4 17V8.833c.346.115.691.167 1 .167h15v9z"/></svg>
							Wallet
						</a>
					</li>
				</ul>
			</section>  -->
		</nav>
	</header>
	
	<main class="content-wrap">
		<header class="content-head">
			<h1 style="margin-bottom:20px ;">TAMBAH DATA GAJI KARYAWAN</h1>
				
			<!-- <div class="action">
				<button>
					Save search
				</button>
			</div> -->
		</header>
		
		<div class="content">
			<div class="">
				<div class="card shadow p-3 mb-5 bg-body rounded">
					<div class="card-body">
						<form method="POST" onsubmit="return submitForm()" name="form">
                            <div class="form-group">
								<label for="nama_kar">Full Name</label>
								<input type="text" class="form-control" name="nama_kar" id="nama_kar">
								<small class="form-text text-danger" id="nama_kar_error"></small>
							</div>
                            <br>
                            <div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" class="form-control" name="nip" id="nip">
								<small class="form-text text-danger" id="nip_error"></small>
							</div>
							<br>
							<div class="form-group">
								<label for="total_gaji">Gaji</label>
								<input type="text" class="form-control" name="total_gaji" id="total_gaji">
								<small class="form-text text-danger" id="total_gaji"></small>
							</div>
							<br>
							<button type="submit" name="submit" value="tambahData" class="btn btn-primary" onclick=''>Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

   
<!-- <div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project Website UAS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/laptop.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Project Website UTS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="about.html">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Programming Store</h1>
                <p class="lead fw-normal text-white-50 mb-0">Menyediakan Perangkat dan Akseseoris Untuk Kamu Coding</p>
            </div>
        </div>
    </header>

    <!------ Include the above in your HEAD tag ---------->
    <div class="container text-center" style="margin-top:80px;">
        <?php 

        require_once("koneksi.php");

        if(isset($_POST['login']))
        {

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
            $stmt = $conn->prepare($sql);
    
            // bind parameter ke query
            $params = array(
            ":username" => $username,
            ":email" => $username
            );

            $stmt->execute($params);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // jika user terdaftar
            if($user)
                {
                    // buat Session
                    session_start();
                    $_SESSION["user"] = $user;
                    // login sukses, alihkan ke halaman utama
                    header("Location: mainpage.php");
                }
        }
    ?>

        <form action="" method="POST">

            <div class="form-group text-start">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>
            <br>

            <div class="form-group text-start">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
            <br>

            <input type="submit" class="btn btn-dark btn-block" name="login" value="Masuk" />
            <br>
            <br>

            <p class="login-register-text">Belum punya akun? <a href="register.php">Buat Akun</a></p>

        </form>
        <br>
        <br>
        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4sxdJh3inH3VdRtajoHdEf?utm_source=generator&theme=0" width="50%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </div>

   

    <!-- Footer-->
    <footer class="py-3 bg-dark">
      <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; <a
                  href="https://www.instagram.com/apnugrahahaha/">Wanna Know Me?</a></p>
      </div>
  </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

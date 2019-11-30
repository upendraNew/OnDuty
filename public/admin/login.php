<?php require_once 'includes/header.php' ?>

<?php 

  if(isset($_POST['login'])){

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    if(empty($email) && empty($password)){
      die("NO DATA");
      return header("Location: ./login.php");
    }

    if($_POST['uorw'] == 'user'){
      if($userClass->login($email, $password) == 0){
        return header("Location: ./login.php");
      }else{
        $_SESSION['email'] = $email;
        header("Location: ./index.php");
      }
    }else{
      if($workerClass->login($email, $password) == 0){
        return header("Location: ./login.php");
      }else{
        $_SESSION['email'] = $email;
        header("Location: ./index.php");
      }
    }
  }

?>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block login-image"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    <form class="user" method="post">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control form-control-user"
                          id="exampleInputEmail"
                          aria-describedby="emailHelp"
                          placeholder="Enter Email Address...",
                          name="Email"
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          class="form-control form-control-user"
                          id="exampleInputPassword"
                          placeholder="Password",
                          name="Password"
                        />
                      </div>
                      
                      <div class="form-group">
                    <select class="form-control" name="uorw">
                     <option value="user">User</option>
                     <option value="worker">Worker</option>
                    </select>
                  </div>    
                      <button
                        class="btn btn-primary btn-user btn-block"
                        name="login"
                        type="submit"
                      >
                        Login
                      </button>
                    </form>
                    <hr />
                    <div class="text-center">
                      <a class="small" href="register.php"
                        >Create an Account!</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

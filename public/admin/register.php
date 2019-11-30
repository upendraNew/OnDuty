<?php require_once 'includes/header.php' ?>
<?php 

  if(isset($_POST['register'])){

    $name = $_POST['fullName'];
    $email = $_POST['Email'];
    $mobile = $_POST['Mobile'];
    $password = $_POST['Password'];
    $c_password = $_POST['repeatPassword'];
    $address = $_POST['Address'];

    if(empty($name) && empty($email) && empty($mobile) && empty($password) && empty($c_password) && empty($address)){
      return header("Location: ./register.php");
    }

    print_r($_POST);

    if($_POST['uorw'] == 'worker'){
      $experience = $_POST['Experience'];
      $education = $_POST['Education'];
      $work = $_POST['Work'];
      $salary = $_POST['Salary'];

      if(empty($education) && empty($experience) && empty($work) && empty($salary)){
        header("Location: ./register.php");
      }else{
        // addWorker($name, $email, $address, $mobile, $password, $status, $experience, $education, $work, $salary)
        $workerClass->addWorker($name, $email,$address, $mobile, $password, 'active', $experience, $education, $work, $salary);
        header("Location: ./login.php");     
      }

    }else {
      $userClass->addUser($name, $email, $password,$mobile, $address);
      header("Location: ./login.php");     

    }




  }

?>
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block login-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="post">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control form-control-user"
                      placeholder="Full Name"
                      name="fullName"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      type="email"
                      class="form-control form-control-user"
                      placeholder="Email Address"
                      name="Email"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control form-control-user"
                      placeholder="Mobile Number"
                      name="Mobile"
                    />
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input
                        type="password"
                        class="form-control form-control-user"
                        placeholder="Password"
                        name="Password"
                      />
                    </div>
                    <div class="col-sm-6">
                      <input
                        type="password"
                        class="form-control form-control-user"
                        placeholder="Repeat Password"
                        name="repeatPassword"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user"
                        placeholder="Address"
                        name="Address"
                      />
                    </div>
                  <div class="form-group">
                    <select class="form-control uorw" name="uorw">
                     <option value="user">User</option>
                     <option value="worker">Worker</option>
                    </select>
                  </div>
                  <div class="extra user">
                             
                  </div>
                  
                  <button
                    class="btn btn-primary btn-user btn-block"
                    name="register"
                    type="submit"
                  >
                    Register Account
                  </button>
                </form>
                <hr />
                <div class="text-center">
                  <a class="small" href="login.php"
                    >Already have an account? Login!</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.querySelector(".uorw").addEventListener('click', e => {
        if (document.querySelector(".uorw").value == 'worker') {
            document.querySelector(".extra").innerHTML = `
            
            <div class="form-group">
                <input
                  type="text"
                  class="form-control form-control-user"
                  placeholder="Education"
                  name="Education"
                />
                </div>
            <div class="form-group">
                <input
                  type="text"
                  class="form-control form-control-user"
                  placeholder="experience"
                  name="Experience"
                />
                </div>

                <div class="form-group">
                    <select class="form-control" name="Work">
                     <option value="Plumber">Plumber</option>
                     <option value="Electrician">Electrician</option>
                    </select>
                  </div>     
                                
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control form-control-user"
                                  placeholder="Proposed Salary"
                                  name="Salary"
                                />
                                </div>
        
            
            `;
        }else{
          document.querySelector(".extra").innerHTML = ``;
        }
      } )
    </script>
  </body>
</html>

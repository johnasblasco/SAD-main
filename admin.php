<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form>
            <h1 class="text-center">ADMIN LOGIN</h1>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary" onclick="login(event)">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function login(event){
      event.preventDefault()
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;

        if(username === 'admin' && password === 'admin'){
            alert('LOGIN SUCCESSFUL!');
            console.log("Redirecting...");
            window.location.href = "dashboard.php";

        }
        else{
            alert('LOGIN FAILED')
        }
    }
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

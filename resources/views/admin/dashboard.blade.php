<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">

    <title>Admin Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <img class="navbar-brand brgylogo" src='images/brgylogo.png' href="#">
          <h3>BARANGAY NAZARETH RESIDENTIAL INFORMATION SYSTEM</h3>
          </div>
        </div>
      </nav>
  <!-- BUTTONS LEFT -->
  <div class="position-absolute top-50 start-0 translate-middle bottom">
      <div class="row">
          <div class="col">
          <div class="input-group">
              <span class="badge  bg-secondary">25</span>
              <span class="space"></span>
              <img class="icons" src="images/household.png">
          </div>
          <p><br>HOUSEHOLD<br>NUMBER</p>        
        </div>
        <div class="col">
            <div class="input-group">
                <span class="badge  bg-secondary">100</span>
                <span class="space"></span>
                <img class="icons" src="images/totalpop.png">
            </div>
            <p><br>TOTAL<br>POPULATION</p>  
        </div>
        <div class="pend"><a class="pend-color" style="text-decoration: none" type="button" href="pendingreq.html">
            <div class="input-group">
                <span class="badge  bg-secondary">25</span>
                <span class="space"></span>
                <img class="icons" src="images/pendingreq.png">
            </div>
            <p class="pendp"><br>PENDING<br>REQUEST</p>
          </a>        
          </div>
                  <div class="cols">
            <div class="input-group">
                
            </div>
            <p><br>PENDING<br>REQUEST</p>        
          </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="input-group">
            <span class="badge  bg-secondary">25</span>
            <span class="space"></span>
            <img class="icons" src="images/female.png">
        </div>
        <p><br>FEMALE</p>        
      </div>
      <div class="col">
          <div class="input-group">
              <span class="badge  bg-secondary">100</span>
              <span class="space"></span>
              <img class="icons" src="images/male.png">
          </div>
          <p><br>MALE</p>  
      </div>
      <div class="col">
          <div class="input-group">
              <span class="badge  bg-secondary">25</span>
              <span class="space"></span>
              <img class="icons" src="images/senior.png">
          </div>
          <p><br>SENIORS</p>        
        </div>
        <div class="col">
            <div class="input-group">
                <span class="badge  bg-secondary">25</span>
                <span class="space"></span>
                <img class="icons" src="images/pwd.png">
            </div>
            <p><br>PWDs</p>        
          </div>
    </div>
  </div>
  <div class="position-absolute top-50 start-50 translate-middle bottom2">
    <table>
        <tr>
          <td>
            <a type="button" class="btn btn-warning">DASHBOARD</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button" href="residentrec.html" class="btn btn-warning">RESIDENT RECORD</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button"  href="grants.html"  class="btn btn-warning">GRANT</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button"  href="status.html"  class="btn btn-warning">CREATE NEWS</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button"  href="adminlogin.html"  class="btn btn-warning">LOGOUT</a>
          </td>
        </tr>
        <td>
          
        </td>
      </table>

  </div>
  
  

  <!-- CREATE POST -->
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">

    <title>Admin Dashboard</title>
  </head>
  <body>
    @php
      use App\Models\PendingRequest;
      use App\Models\Resident;
      use App\Models\Family;
      use App\Models\Occupation;
    @endphp
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <img class="navbar-brand brgylogo" src="{{ asset('images/brgylogo.png') }}" href="#">
          <h3>BARANGAY NAZARETH RESIDENTIAL INFORMATION SYSTEM</h3>
          </div>
        </div>
      </nav>
  <!-- BUTTONS LEFT -->
  <div class="position-absolute top-50 start-0 translate-middle bottom">
      <div class="row">
          <div class="col">
          <div class="input-group">
              <span class="badge  bg-secondary">{{ Family::totalHousehold() }}</span>
              <span class="space"></span>
              <img class="icons" src="{{ asset('images/household.png') }}">
          </div>
          <p><br>HOUSEHOLD<br>NUMBER</p>        
        </div>
        <div class="col">
            <div class="input-group">
                <span class="badge  bg-secondary">{{ Resident::totalPopulation() }}</span>
                <span class="space"></span>
                <img class="icons" src="{{ asset('images/totalpop.png') }}">
            </div>
            <p><br>TOTAL<br>POPULATION</p>  
        </div>
        <div class="pend"><a class="pend-color" style="text-decoration: none" type="button" href="/pending">
            <div class="input-group">
                <span class="badge  bg-secondary">{{ PendingRequest::pendingListCount() }}</span>
                <span class="space"></span>
                <img class="icons" src="{{ asset('images/pendingreq.png') }}">
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
            <span class="badge  bg-secondary">{{ Resident::totalFemale() }}</span>
            <span class="space"></span>
            <img class="icons" src="{{ asset('images/female.png') }}">
        </div>
        <p><br>FEMALE</p>        
      </div>
      <div class="col">
          <div class="input-group">
              <span class="badge  bg-secondary">{{ Resident::totalMale() }}</span>
              <span class="space"></span>
              <img class="icons" src="{{ asset('images/male.png') }}">
          </div>
          <p><br>MALE</p>  
      </div>
      <div class="col">
          <div class="input-group">
              <span class="badge  bg-secondary">{{ Occupation::totalSenior() }}</span>
              <span class="space"></span>
              <img class="icons" src="{{ asset('images/senior.png') }}">
          </div>
          <p><br>SENIORS</p>        
        </div>
        <div class="col">
            <div class="input-group">
                <span class="badge  bg-secondary">{{ Occupation::totalPWD() }}</span>
                <span class="space"></span>
                <img class="icons" src="{{ asset('images/pwd.png') }}">
            </div>
            <p><br>PWDs</p>        
          </div>
    </div>
  </div>
  <div class="position-absolute top-50 start-50 translate-middle bottom2">
    <table>
        <tr>
          <td>
            <a type="button" href="/" class="btn btn-warning">DASHBOARD</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button" href="/records" class="btn btn-warning">RESIDENT RECORD</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button"  href="/grants"  class="btn btn-warning">GRANT</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button"  href="/news"  class="btn btn-warning">CREATE NEWS</a>
          </td>
        </tr>
        <tr>
          <td>
            <a type="button"  href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" 
              class="btn btn-warning">LOGOUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
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
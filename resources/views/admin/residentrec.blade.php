<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/residentrec.css') }}">

    <title>Admin Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <img class="navbar-brand brgylogo" src='{{ asset('images/brgylogo.png') }}' href="#">
          <h3>BARANGAY NAZARETH RESIDENTIAL INFORMATION SYSTEM</h3>
          </div>
        </div>
      </nav>
  <!-- BUTTONS LEFT -->
  <div class="position-absolute top-50 start-50 translate-middle bottom">
  <table>
    <tr>
      <td>
        <div class="container crtstatus">
          <form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Street Number / Family Name / etc." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button id="btn btn-secondary" type="button" id="button-addon2">SEARCH</button>
              </div>
              <table class="table tb">
                <thead>
                  <tr>
                    <th scope="col">Street#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Status</th>
                    <th scope="col">Househead</th>
                    <th scope="col">Household No.</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Kara Mareh Ladera</td>
                    <td>F</td>
                    <td>22</td>
                    <td>Student</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0905776881</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Employed</td>
                    <td>Single</td>
                    <td>NO</td>
                    <td>3</td>
                    <td>0905756181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Unemployed</td>
                    <td>Single</td>
                    <td>NO</td>
                    <td>6</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Widow</td>
                    <td>NO</td>
                    <td></td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>3</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                     <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>Single</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>0907856181</td>
                    <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Nathalie Jo Nicole</td>
                    <td>F</td>
                    <td>30</td>
                    <td>Manager</td>
                    <td>YES</td>
                    <td>5</td>
                    <td>Single</td>
                    <td>0907856181</td>
                    <th scope="col"><a href="viewmore.html" class="link" type="button">more</a></th>
                  </tr>
                </tbody>
              </table>
        </div>

        </form>
      </td>
      <td>
  <!-- CREATE NEWS  -->
  <table>
    <tr>
      <td>
        <a type="button" href="dashboard.html" class="btn btn-warning">DASHBOARD</a>
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
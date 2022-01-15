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
          
            <form action="/grants">
              <div class="input-group mb-3">
                <input name="searchitem" type="text" class="form-control" placeholder="Name / Contact " aria-label="Recipient's username" aria-describedby="button-addon2">
                <button type="submit" id="btn btn-secondary" type="button" id="button-addon2">SEARCH</button>
              </div>
            </form>
              @php
                use App\Models\Resident;
                use App\Models\Occupation;

              @endphp
              <table class="table tb">
                <thead>
                  <tr>
                    <th scope="col">Resident ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Level</th>
                    <th scope="col">Sponsor</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($scholarList as $scholarItem)
                    <tr>
                      <th scope="row">{{ $scholarItem->id }}</th>
                      <td>{{ $scholarItem->name }}</td>
                      <td>{{ $scholarItem->sex }}</td>
                      <td>{{ $scholarItem->birthdate }}</td>
                      <td>{{ Occupation::educLevel($scholarItem->id) }}</td>
                      <td>{{ Occupation::scholarSponsor($scholarItem->id) }}</td>
                      <td>{{ $scholarItem->contact }}</td>
                      <th scope="col"><a class="link" href="/more/{{ $scholarItem->id }}" type="button">more</a></th>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>

      </td>
      <td>
  <!-- CREATE NEWS  -->
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
      </td>
  </tr>
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
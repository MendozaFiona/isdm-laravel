<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pendingreq.css') }}">

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
                <h5>PENDING REQUESTS</h5>
              </div>
              <table class="table tb">
                <thead>
                
                  <tr>
                    <th scope="col">Request #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    use App\Models\PendingRequest;
                    use App\Models\Resident;

                    $pendingList = PendingRequest::all();
                  @endphp

                  @foreach ($pendingList as $pendingItem)
                    <tr>
                      <th scope="row">{{ $pendingItem->id }}</th>
                      <td>{{ $pendingItem->name }}</td>
                      <td>{{ $pendingItem->sex }}</td>
                      <td>{{ Resident::age($pendingItem->birthdate) }}</td>
                      <td>{{ $pendingItem->contact }}</td>
                      <th scope="col"><a style="text-decoration: none" href="/viewmore" class="btnn-more" type="button">MORE</a></th>
                      <th scope="col"><a style="text-decoration: none" class="btnn-acc"  class="link" type="button">ACCEPT</a></th>
                      <th scope="col"><a style="text-decoration: none"  class="btnn-rej" class="link" type="button">REJECT</a></th>
                    </tr>
                  @endforeach
                                   
                </tbody>
              </table>
        </div>

        </form>
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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $(document).ready(function(){
          $('input[type="radio"]').click(function(){
              var inputValue = $(this).attr("value");
              var targetBox = $("." + inputValue);
              $(".box").not(targetBox).hide();
              $(targetBox).show();

              var sname = document.getElementById("company_s");
              var sid = document.getElementById("id_num");
              var spic = document.getElementById("pic_s");

              if(inputValue == 'Student'){
                sname.required = true;
                sid.required = true;
                spic.required = true;

                sname.disabled = false;
                sid.disabled = false;
                spic.disabled = false;
              } else{
                sname.required = false;
                sid.required = false;
                spic.required = false;

                sname.disabled = true;
                sid.disabled = true;
                spic.disabled = true;
              }

              var upic = document.getElementById("pic_u");

              if(inputValue == 'Unemployed'){
                upic.required = true;
                upic.disabled = false;
              } else{
                upic.required = false;
                upic.disabled = true;
              }

              var ename = document.getElementById("occupation_name1");
              var ecomp = document.getElementById("company1");
              var epic = document.getElementById("pic1");

              if(inputValue == 'Employed'){
                ename.required = true;
                ecomp.required = true;
                epic.required = true;

                ename.disabled = false;
                ecomp.disabled = false;
                epic.disabled = false;
              } else{
                ename.required = false;
                ecomp.required = false;
                epic.required = false;

                ename.disabled = true;
                ecomp.disabled = true;
                epic.disabled = true;
              }

              var secomp = document.getElementById("company_se");
              var sepic = document.getElementById("pic_se");

              if(inputValue == 'Self-employed'){
                secomp.required = true;
                sepic.required = true;

                secomp.disabled = false;
                sepic.disabled = false;
              } else{
                secomp.required = false;
                sepic.required = false;

                secomp.disabled = true;
                sepic.disabled = true;
              }
          });
        });
                

        $(document).ready(function(){

        $(".dropdown-menu li a").click(function(){

        $(".btns:first-child").text($(this).text());
        $(".btns:first-child").val($(this).text());

      });

      });
      $(document).ready(function(){
        var checker = document.getElementById('checkme');
        var sendbtn = document.getElementById('head');
        var sendbtn2 = document.getElementById('head2');
        var fam = document.getElementById('famname');
        // when unchecked or checked, run the function
            checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
                sendbtn.required = true;

                sendbtn2.disabled = false;
                sendbtn2.required = true;

                fam.disabled = true;
                fam.required = false;
            } else {
                sendbtn.disabled = true;
                sendbtn.required = false;

                sendbtn2.disabled = true;
                sendbtn2.required = false;

                fam.disabled = false;
                fam.required = true;
            }

            }
          });

    
    </script>
    <title>Brgy. Nazareth Residential System</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <img class="navbar-brand" src='{{ asset('images/brgylogo.png') }}' href="#">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
          <ul class="navbar-nav me-auto my-2 my-lg-0">
           
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/profile">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                LOGOUT
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
              </ul>
        </div>
      </div>
    </nav>

    @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\Resident;
        use App\Models\Family;
        use App\Models\Occupation;

        $resident_id = Auth::user()->resident_id;
        $resident = Resident::where('id', $resident_id)->first();

        $family_id = $resident->family_id;

        $res_name = $resident->name;
        $res_famname = Family::where('id', $family_id)->value('family_name');
        //$address here
        $res_email = Auth::user()->email;
        $res_phone = $resident->contact;
        $res_bd = date('Y-m-d', strtotime($resident->birthdate));
        $res_sex = $resident->sex;
        $res_stat = $resident->status;
        $occ_type = $resident->occupation;

        $occupation = Occupation::where('resident_id', $resident_id)->first();

        $occ_name = $occupation->occupation_name;
        $occ_comp = $occupation->company_name;
        $occ_idnum = $occupation->id_num;
        $occ_pic = $occupation->pic;

    @endphp

    <div class="container-2">
      @include('inc.messages')
      <form method="POST" class="{{ route('edit-resident') }}" enctype="multipart/form-data">
        @csrf
        <!-- FORM START -->
        <div class="container-4">
          <div class="row">
            <div class="row-3">
              <div class="space"></div>
              <div class="col-4">
                <label for="personalInfo" class="optional">PERSONAL INFORMATION</label>
              </div>
            </div>
            <div class="col">
              <label for="name"></label>
              <input value="{{ $res_name }}" name="name" placeholder="Name" type="name" class="form-control" required  aria-describedby="emailHelp">
            </div>
            <div class="col">
              <label for="family_name"></label>
              <input id="famname" value="{{ $res_famname }}" name="family_name" placeholder="Family Name ex. Tejaro-Mejada" type="text" class="form-control" required aria-describedby="emailHelp">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="address"></label>
              <input value="{{ old('address') }}" name="address" placeholder="Street No./ Street name/ Lot. No/ Blk No." type="address" class="form-control" required id="addrs" aria-describedby="emailHelp">
            </div>
          </div> 
          <div class="row">
            <div class="col">
              <label for="email"></label>
              <input value="{{ $res_email }}" name="email" placeholder="Email" type="email" class="form-control" required id="email" aria-describedby="emailHelp">
            </div>
            <div class="col">
              <label for="number"></label>
              <input value="{{ $res_phone }}" name="number" placeholder="Phone number" minlength="11" type="tel" pattern="[0]{1}[9]{1}[0-9]{9}" class="form-control" required id="phone" aria-describedby="emailHelp">
            </div>
            <div class="col">
              <label for="birthdate"></label>
              <input value="{{ $res_bd }}" name="birthdate"  type="date" class="form-control" required id="birthdate" aria-describedby="emailHelp">
            </div>
            <div class="col">
              <!--removed form here-->
              <label for="sex">Sex</label>
              <select name="sex">
                <option @if(old('sex') == 'Female') selected @endif>Female</option>
                <option @if(old('sex') == 'Male') selected @endif>Male</option>
              </select>
            </div>

            <div class="col">
              <label for="status">Status</label>
              <select name="status">
                <option @if(old('status') == 'Single') selected @endif>Single</option>
                <option @if(old('status') == 'Married') selected @endif>Married</option>
                <option @if(old('status') == 'Widow') selected @endif>Widow</option>
              </select>
            </div>
                               
          <div class="space"></div>
          <div class="space"></div>

          <!-- OCCUPATION FORM -->
          <div class="row-4">
            <div class='col-4'>
            <label for="occdetails" class="form-label">OCCUPATION DETAILS: </label>
            <p class="upid">(UPLOAD ID PICTURE ON THE FOLLOWING)</p>
          </div>
          </div>
          <div>
            <!-- maybe change this to type?-->
            <label for="student"><input name="type" type="radio" required value="Student">Student</label>
            <label for="unemployed"><input name="type" type="radio" value="Unemployed">Unemployed</label>
            <label for="employed"><input name="type" type="radio" value="Employed">Employed</label>
            <label for="self-employed"><input name="type" type="radio" value="Self-employed">Self-employed</label>
            
          </div>
        <!-- IF STUDENT DISPLAY -->
        <div class="Student box">
          <div class="input-group">
                <label for="occupation_name_s"></label>
                <select name="occupation_name_s">
                  <option>Elementary</option>
                  <option>High School</option>
                  <option>College</option>
                  <option>TESDA</option>
                </select>
            <label for="company_s"></label>
            <input id="company_s" name="company_s" placeholder="Scholarship Name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="id_num"></label>
            <input id="id_num" name="id_num" placeholder="ID Number"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="pic_s"></label>
            <input id="pic_s" accept="image/png, image/jpeg" name="pic_s" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        <!-- IF UNEMPLOYED -->
        <div class="Unemployed box">
          <div class="input-group">
            <label for="occupation_name_u"></label>
            <select name="occupation_name_u">
              <option>PWD</option>
              <option>Senior</option>
              <option>None</option>
            </select>
            
            <input placeholder="Upload ID according to the selection:"  type="name" class="form-control" aria-describedby="emailHelp" disabled/>
            
            <label for="pic_u"></label>
            <input id="pic_u" accept="image/png, image/jpeg" name="pic_u" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        <div class="Employed box">
          <div class="input-group">
            <label for="occupation_name1"></label>
            <input id="occupation_name1" name="occupation_name1" placeholder="Occupation Name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="company1"></label>
            <input id="company1" name="company1" placeholder="Company Name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="pic1"></label>
            <input id="pic1" accept="image/png, image/jpeg" name="pic1" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        <!-- IF SELF-EMPLOYED -->
        <div class="Self-employed box">
          <div class="input-group">
            <label for="company_se"></label>
            <input id="company_se" name="company_se" placeholder="Business name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <input placeholder="Upload business permit (optional):"  type="name" class="form-control" aria-describedby="emailHelp" disabled/>
            
            <label for="pic_se"></label>
            <input id="pic_se" accept="image/png, image/jpeg" name="pic_se" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        
        <div class="space"></div>
        <div class="row">
          <div class='col-4'>
            <label for="addr" class="form-label">  UPLOAD VALID PROOF OF RESIDENCE:</label>
          </div>
          <div class="col-4">
            
            
            <label for="prooftype">Select any valid proof of residence</label>
            <select name="prooftype">
              <option @if(old('prooftype') == 'UMID') selected @endif>
                UMID</option>
              <option @if(old('prooftype') == 'Driver License') selected @endif>
                Driver License</option>
              <option @if(old('prooftype') == 'Barangay Certificate') selected @endif>
                Barangay Certificate</option>
              <option @if(old('prooftype') == 'Police ID/Clearance') selected @endif>
                Police ID/Clearance</option>
              <option @if(old('prooftype') == 'Water Bill') selected @endif>
                Water Bill</option>
              <option @if(old('prooftype') == 'Electricity Bill') selected @endif>
                Electricity Bill</option>
              <option @if(old('prooftype') == 'Landline Phone Bill') selected @endif>
                Landline Phone Bill</option>
              <option @if(old('prooftype') == 'Postpaid Line Bill') selected @endif>
                Postpaid Line Bill</option>
              <option @if(old('prooftype') == 'Internet Bill') selected @endif>
                Internet Bill</option>
              <option @if(old('prooftype') == 'Bank Statement with Address') selected @endif>
                Bank Statement with Address</option>
              <option @if(old('prooftype') == 'Credit Card Statement Account (SoA)') selected @endif>
                Credit Card Statement Account (SoA)</option>
              <option @if(old('prooftype') == 'National of Investigation (NBI clearance)') selected @endif>
                National of Investigation (NBI clearance)</option>
              <option @if(old('prooftype') == 'Lease Contract') selected @endif>
                Lease Contract</option>
            </select>
            
          </div>
          
        
          <div class="col-4">
            <div class="input-group">
              <label for="proofpic"></label>
              <input value="{{ old('proofpic') }}" name="proofpic" accept="image/png, image/jpeg" type="file" class="form-control" required aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
          </div>
        
        </div>
      
        <div class="row-3">
          <div class="space"></div>
        <div class="row">
          <div class="col-4">
              <div class="form-check">
                <label for="head"></label>
                <input name="head" id="checkme" type="checkbox">  HOUSEHOLD HEAD
              </div>
        </div>
        <div class="row" >
          <div class="input-group ig3">          
            <label for="family_name2"></label>
            <input name="family_name2" disabled="disabled" id="head2" placeholder="Family Name ex. Tejaro-Mejada" type="input" class="form-control" aria-describedby="emailHelp">
        
            <label for="famincome"></label>
            <input name="famincome" disabled="disabled" id="head" placeholder="Family Income" type="number" class="form-control" aria-describedby="emailHelp">
          </div>
        </div>
        <div class="row">
          
          <div class="d-grid gap-2 col-6 mx-auto">
            <button id="myBtn" class="btn btn-warning " type="submit">REQUEST EDIT</button>
          </div>
        
          <div class="space"></div>
        </div>
      </form>
      
      <!-- POP MESSAGE FOR REQUEST TO EDIT-->
      <div id="myModal" class="modal">
      
        <!-- Modal content -->
        <div class="position-absolute top-50 start-50 translate-middle modals">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2 class="position-absolute top-40 start-50 translate-middle pos">ATTENTION!</h2>
          </div>
          <div class="modal-body">
            <p>Please wait 30mins on verfying your request then check your mobile for a text. <br>Thank you! </p>
          </div>
        </div>
      
      </div>
      
      <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
      </script>
    </div>

    

    

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
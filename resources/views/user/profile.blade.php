<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @php
      use Illuminate\Support\Facades\Auth;
      use App\Models\Resident;
      use App\Models\Family;
      use App\Models\Occupation;
      use App\Models\Proof;

      $resident_id = Auth::user()->resident_id;
      $resident = Resident::where('id', $resident_id)->first();

      $family_id = $resident->family_id;
      $family_inc = Family::where('id', $family_id)->value('family_income');

      $res_name = $resident->name;
      $res_famname = Family::where('id', $family_id)->value('family_name');
      $res_addr = $resident->address;
      $res_email = Auth::user()->email;
      $res_phone = $resident->contact;
      $res_bd = date('Y-m-d', strtotime($resident->birthdate));
      $res_sex = $resident->sex;
      $res_stat = $resident->status;
      $res_role = $resident->family_role;

      $occupation = Occupation::where('resident_id', $resident_id)->first();

      $occ_type = $resident->occupation;

      //if($occ_type != )
      $occ_name = $occupation->occupation_name;
      $occ_comp = $occupation->company_name;
      $occ_idnum = $occupation->id_num;
      $occ_pic = $occupation->pic;

      $proof = Proof::where('resident_id', $resident_id)->first();

      $proof_tp = $proof->proof_type;
      $proof_pic = $proof->proof_pic;
      $proof_path = storage_path('public/uploaded_pictures/' . $proof_pic);

    @endphp

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $(document).ready(function(){
          var sname = document.getElementById("company_s");
          var sid = document.getElementById("id_num");
          var spic = document.getElementById("pic_s");

          var upic = document.getElementById("pic_u");

          var ename = document.getElementById("occupation_name1");
          var ecomp = document.getElementById("company1");
          var epic = document.getElementById("pic1");

          var secomp = document.getElementById("company_se");
          var sepic = document.getElementById("pic_se");

          function checkRadio(selectVal){
            var targetBox = $("." + selectVal);
            $(".box").not(targetBox).hide();
            $(targetBox).show();

            if(selectVal == 'Student'){
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

            
            if(selectVal == 'Unemployed'){
              upic.required = true;
              upic.disabled = false;
            } else{
              upic.required = false;
              upic.disabled = true;
            }


            if(selectVal == 'Employed'){
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

            
            if(selectVal == 'Self-employed'){
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
          }

          var occType = "<?php echo $occ_type; ?>";
          checkRadio(occType);
          
          $('input[type="radio"]').click(function(){
              var inputValue = $(this).attr("value");              
              checkRadio(inputValue);
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

        var res_role = "<?php echo $res_role; ?>";

        function checkDisable(){
          sendbtn.disabled = false;
          sendbtn.required = true;

          sendbtn2.disabled = false;
          sendbtn2.required = true;

          fam.disabled = true;
          fam.required = false;
        }

        if(res_role == 'Head'){
          checkDisable();
        }
        // when unchecked or checked, run the function
            checker.onchange = function(){
            if(this.checked){
                checkDisable();
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
    
    <div class="container-2">
      
      <form method="POST" class="{{ route('edit-resident') }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put" />
        @csrf
        <!-- FORM START -->
        <div class="container-4">
          <div class="row">
            <div class="row-3">
              @include('inc.messages')
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
              <label for="password"></label>
              <input value="{{ old('password') }}" name="password" placeholder='Password' type="password" minlength="8" class="form-control" required id="password" aria-describedby="emailHelp">
            </div>
            <div class="col">
              <label for="confirm"></label>
              <input value="{{ old('confirm') }}" name="confirm" placeholder="Confirm password" type="password" class="form-control" required id="cpassword" aria-describedby="emailHelp" oninput="check(this)">
              
              <script language='javascript' type='text/javascript'>
                function check(input) {
                    if (input.value != document.getElementById('password').value) {
                        input.setCustomValidity('Password Must be Matching.');
                    } else {
                        // input is valid -- reset the error message
                        input.setCustomValidity('');
                    }
                }
              </script>
            
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="address"></label>
              <input value="{{ $res_addr }}" name="address" placeholder="Street No./ Street name/ Lot. No/ Blk No." type="address" class="form-control" required id="addrs" aria-describedby="emailHelp">
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
                <option @if($res_sex == 'Female') selected @endif>Female</option>
                <option @if($res_sex == 'Male') selected @endif>Male</option>
              </select>
            </div>

            <div class="col">
              <label for="status">Status</label>
              <select name="status">
                <option @if($res_stat == 'Single') selected @endif>Single</option>
                <option @if($res_stat == 'Married') selected @endif>Married</option>
                <option @if($res_stat == 'Widow') selected @endif>Widow</option>
              </select>
            </div>

            <div class="row">
              <div class="col-4">
                <label for="family_name"></label>
                <input id="famname" value="{{ $res_famname }}" name="family_name" placeholder="Family Name ex. Tejaro-Mejada" type="text" class="form-control" required aria-describedby="emailHelp">
              </div>
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
            <label for="student"><input @if($occ_type == 'Student') checked @endif name="type" type="radio" required value="Student">Student</label>
            <label for="unemployed"><input @if($occ_type == 'Unemployed') checked @endif name="type" type="radio" value="Unemployed">Unemployed</label>
            <label for="employed"><input @if($occ_type == 'Employed') checked @endif name="type" type="radio" value="Employed">Employed</label>
            <label for="self-employed"><input @if($occ_type == 'Self-employed') checked @endif name="type" type="radio" value="Self-employed">Self-employed</label>
            
          </div>
        <!-- IF STUDENT DISPLAY -->
        <div class="Student box">
          <div class="input-group">
                <label for="occupation_name_s"></label>
                <select name="occupation_name_s">
                  <option @if($occ_name == 'Elementary') selected @endif>Elementary</option>
                  <option @if($occ_name == 'High School') selected @endif>High School</option>
                  <option @if($occ_name == 'College') selected @endif>College</option>
                  <option @if($occ_name == 'TESDA') selected @endif>TESDA</option>
                </select>
            <label for="company_s"></label>
            <input value="{{ $occ_comp }}" id="company_s" name="company_s" placeholder="Scholarship Name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="id_num"></label>
            <input value="{{ $occ_idnum }}" id="id_num" name="id_num" placeholder="ID Number"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="pic_s"></label>
            <input id="pic_s" accept="image/png, image/jpeg" name="pic_s" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        <!-- IF UNEMPLOYED -->
        <div class="Unemployed box">
          <div class="input-group">
            <label for="occupation_name_u"></label>
            <select name="occupation_name_u">
              <option @if($occ_name == 'PWD') selected @endif>PWD</option>
              <option @if($occ_name == 'Senior') selected @endif>Senior</option>
              <option @if($occ_name == 'None') selected @endif>None</option>
            </select>
            
            <input placeholder="Upload ID according to the selection:"  type="name" class="form-control" aria-describedby="emailHelp" disabled/>
            
            <label for="pic_u"></label>
            <input id="pic_u" accept="image/png, image/jpeg" name="pic_u" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        <div class="Employed box">
          <div class="input-group">
            <label for="occupation_name1"></label>
            <input value="{{ $occ_name }}" id="occupation_name1" name="occupation_name1" placeholder="Occupation Name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="company1"></label>
            <input value="{{ $occ_comp }}" id="company1" name="company1" placeholder="Company Name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
            <label for="pic1"></label>
            <input id="pic1" accept="image/png, image/jpeg" name="pic1" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
        <!-- IF SELF-EMPLOYED -->
        <div class="Self-employed box">
          <div class="input-group">
            <label for="company_se"></label>
            <input value="{{ $occ_comp }}" id="company_se" name="company_se" placeholder="Business name"  type="name" class="form-control" aria-describedby="emailHelp"/>
            
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
              <option @if($proof_tp == 'UMID') selected @endif>
                UMID</option>
              <option @if($proof_tp == 'Driver License') selected @endif>
                Driver License</option>
              <option @if($proof_tp == 'Barangay Certificate') selected @endif>
                Barangay Certificate</option>
              <option @if($proof_tp == 'Police ID/Clearance') selected @endif>
                Police ID/Clearance</option>
              <option @if($proof_tp == 'Water Bill') selected @endif>
                Water Bill</option>
              <option @if($proof_tp == 'Electricity Bill') selected @endif>
                Electricity Bill</option>
              <option @if($proof_tp == 'Landline Phone Bill') selected @endif>
                Landline Phone Bill</option>
              <option @if($proof_tp == 'Postpaid Line Bill') selected @endif>
                Postpaid Line Bill</option>
              <option @if($proof_tp == 'Internet Bill') selected @endif>
                Internet Bill</option>
              <option @if($proof_tp == 'Bank Statement with Address') selected @endif>
                Bank Statement with Address</option>
              <option @if($proof_tp == 'Credit Card Statement Account (SoA)') selected @endif>
                Credit Card Statement Account (SoA)</option>
              <option @if($proof_tp == 'National of Investigation (NBI clearance)') selected @endif>
                National of Investigation (NBI clearance)</option>
              <option @if($proof_tp == 'Lease Contract') selected @endif>
                Lease Contract</option>
            </select>
            
          </div>
          
        
          <div class="col-4">
            <div class="input-group">
              <label for="proofpic"></label>
              <input name="proofpic" accept="image/png, image/jpeg" type="file" class="form-control" required aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
          </div>
        
        </div>
      
        <div class="row-3">
          <div class="space"></div>
        <div class="row">
          <div class="col-4">
              <div class="form-check">
                <label for="head"></label>
                <input @if($res_role == 'Head') checked @endif name="head" id="checkme" type="checkbox">  HOUSEHOLD HEAD
              </div>
        </div>
        <div class="row" >
          <div class="input-group ig3">          
            <label for="family_name2"></label>
            <input value="{{ $res_famname }}" name="family_name2" disabled="disabled" id="head2" placeholder="Family Name ex. Tejaro-Mejada" type="input" class="form-control" aria-describedby="emailHelp">
        
            <label for="famincome"></label>
            <input value="{{ $family_inc }}" name="famincome" disabled="disabled" id="head" placeholder="Family Income" type="number" class="form-control" aria-describedby="emailHelp">
          </div>
        </div>
        <!-- POP MESSAGE FOR REQUEST TO EDIT--> <!--
        <div id="myModal" class="modal">
        
          Modal content 
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
        </script> -->
        @if(session()->has('message'))
            <script>
                alert('{{ session()->get('message') }}');
            </script>
        @endif
        <div class="row">
          
          <div class="d-grid gap-2 col-6 mx-auto">
            <button id="myBtn" class="btn btn-warning " type="submit">REQUEST EDIT</button>
          </div>      
          <div class="space"></div>
        </div>
      </form>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a type="button" href="/cancel" class="btn btn-danger">CANCEL PRIOR EDIT REQUEST</a>
      </div>
          
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
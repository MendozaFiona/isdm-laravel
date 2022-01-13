<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/userStyle.css') }}">

    
    <title>Residential Registration</title>
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
  <body>
    <!-- LOGO & SYSTEM NAME -->
    <div class="wrap">
    <div class="container-3">
      <div class='row'>
        <div class='col'>
      <img class="brgylogo2" src="{{ asset('images/brgylogo.png') }}">
    </div>
  </div>
  <div class="row">
    <div class='col'>
      <h5>BARANGAY NAZARETH RESIDENTIAL INFORMATION SYSTEM</h5>
    </div>
  </div>
  @include('inc.messages')
    <form method="POST" class="{{ route('reg-resident') }}" enctype="multipart/form-data">
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
            <input value="{{ old('name') }}" name="name" placeholder="Name" type="name" class="form-control" required  aria-describedby="emailHelp">
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
            <input value="{{ old('address') }}" name="address" placeholder="Street No./ Street name/ Lot. No/ Blk No." type="address" class="form-control" required id="addrs" aria-describedby="emailHelp">
          </div>
        </div> 
        <div class="row">
          <div class="col">
            <label for="email"></label>
            <input value="{{ old('email') }}" name="email" placeholder="Email" type="email" class="form-control" required id="email" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <label for="number"></label>
            <input value="{{ old('number') }}" name="number" placeholder="Phone number" minlength="11" type="tel" pattern="[0]{1}[9]{1}[0-9]{9}" class="form-control" required id="phone" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <label for="birthdate"></label>
            <input value="{{ old('birthdate') }}" name="birthdate" placeholder="Birthdate (mm/dd/yyyy)"  type="date" class="form-control" required id="birthdate" aria-describedby="emailHelp">
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

        <div class="row">
          <div class="col-4">
            <label for="family_name"></label>
            <input id="famname" value="{{ old('family name') }}" name="family_name" placeholder="Family Name ex. Tejaro-Mejada" type="text" class="form-control" required aria-describedby="emailHelp">
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
          <button class="btn btn-warning " type="submit">SUBMIT</button>
        </div>
      
        <div class="space"></div>
      </div>
    </form>
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
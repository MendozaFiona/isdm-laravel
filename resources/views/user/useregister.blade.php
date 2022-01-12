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
      var sendbtn = document.getElementById('sendNewSms');
      var sendbtn1 = document.getElementById('sendNewSms1');
      var sendbtn2 = document.getElementById('sendNewSms2');
      // when unchecked or checked, run the function
          checker.onchange = function(){
          if(this.checked){
              sendbtn.disabled = false;
              sendbtn1.disabled = false;
              sendbtn2.disabled = false;
          } else {
              sendbtn.disabled = true;
              sendbtn1.disabled = true;
              sendbtn2.disabled = true;
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
    <form method="POST" class="{{ route('reg-resident') }}">
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
            <input name="name" placeholder="Name" type="name" class="form-control"  aria-describedby="emailHelp">
          </div>
          <div class="col">
            <label for="password"></label>
            <input name="password" placeholder='Password' type="password" class="form-control" id="password" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <label for="confirm"></label>
            <input name="confirm" placeholder="Confirm password" type="password" class="form-control" id="cpassword" aria-describedby="emailHelp">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="address"></label>
            <input name="address" placeholder="Street No./ Street name/ Lot. No/ Blk No." type="address" class="form-control" id="addrs" aria-describedby="emailHelp">
          </div>
        </div> 
        <div class="row">
          <div class="col">
            <label for="email"></label>
            <input name="email" placeholder="Email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <label for="number"></label>
            <input name="number" placeholder="Phone number" type="phone" class="form-control" id="phone" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <label for="birthdate"></label>
            <input name="birthdate" placeholder="Birthdate (mm/dd/yy)"  type="birthdate" class="form-control" id="birthdate" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <!--removed form here-->
            <label for="gender">Gender</label>
            <select name="gender">
              <option>Female</option>
              <option>Male</option>
              <option>Non-binary</option>
              <option>Prefer not to say</option>
            </select>
          </div>

          <div class="col">
            <label for="status">Status</label>
            <select name="status">
              <option>Single</option>
              <option>Married</option>
              <option>Widow</option>
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
          <label for="student"><input name="type" id="radio_1" type="radio" value="Student">Student</label>
          <label for="unemployed"><input name="type" type="radio" value="Unemployed">Unemployed</label>
          <label for="employed"><input name="type" type="radio" value="Employed">Employed</label>
          <label for="self-employed"><input name="type" type="radio" value="Self-employed">Self-employed</label>
          
        </div>
      <!-- IF STUDENT DISPLAY -->
      <div class="Student box">
        <div class="input-group">
              <label for="occname"></label>
              <select name="occupation_name">
                <option>-- Education Stage --</option>
                <option>Elementary</option>
                <option>High School</option>
                <option>College</option>
                <option>TESDA</option>
              </select>
          <label for="company"></label>
          <input name="company" placeholder="Scholarship Name"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="id_num"></label>
          <input name="id_num" placeholder="ID Number"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="pic"></label>
          <input name="pic" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <!-- IF UNEMPLOYED -->
      <div class="Unemployed box">
        <div class="input-group">
          <label for="occname"></label>
          <select name="occupation_name">
            <option>PWD</option>
            <option>Senior</option>
            <option>None</option>
          </select>
          
          <input placeholder="Upload ID according to the selection:"  type="name" class="form-control"  aria-describedby="emailHelp" disabled/>
          
          <label for="pic"></label>
          <input name="pic" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <div class="Employed box">
        <div class="input-group">
          <label for="occname1"></label>
          <input name="occupation_name1" placeholder="Occupation #1"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="company1"></label>
          <input name="company1" placeholder="Company Name"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="pic1"></label>
          <input name="pic1" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="input-group">
          <label for="occname2"></label>
          <input name="occupation_name2" placeholder="Occupation #2"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="company2"></label>
          <input name="company2" placeholder="Company Name"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="pic2"></label>
          <input name="pic2" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="input-group">
          <label for="occname3"></label>
          <input name="occupation_name3" placeholder="Occupation #3"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="company3"></label>
          <input name="company3" placeholder="Company Name"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <label for="pic3"></label>
          <input name="pic3" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <!-- IF SELF-EMPLOYED -->
      <div class="Self-employed box">
        <div class="input-group">
          <label for="company"></label>
          <input name="company" placeholder="Business name"  type="name" class="form-control"  aria-describedby="emailHelp"/>
          
          <input placeholder="Upload business permit (optional):"  type="name" class="form-control"  aria-describedby="emailHelp" disabled/>
          
          <label for="pic"></label>
          <input name="pic" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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
            <option>UMID</option>
            <option>Driver License</option>
            <option>Barangay Certificate</option>
            <option>Police ID/Clearance</option>
            <option>Water Bill</option>
            <option>Electricity Bill</option>
            <option>Landline Phone Bill</option>
            <option>Postpaid Line Bill</option>
            <option>Internet Bill</option>
            <option>Bank Statement with Address</option>
            <option>Credit Card Statement Account (SoA)</option>
            <option>National of Investigation (NBI clearance)</option>
            <option>Lease Contract</option>
          </select>
          
        </div>
        
      
        <div class="col-4">
          <div class="input-group">
            <label for="proofpic"></label>
            <input name="proofpic" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
        </div>
      
      </div>
    
      <div class="row-3">
        <div class="space"></div>
      <div class="row">
        <div class="col-4">
            <div class="form-check">
              <label for="head"></label>
              <input name="head" id="checkme" type="radio">  HOUSEHOLD HEAD
            </div>
      </div>
      <div class="row" >
        <div class="input-group ig3">
          <label for="famname"></label>
          <input name="famname" disabled="disabled" id="sendNewSms"  name="sendNewSms" placeholder="Family Name ex. Tejaro-Mejada" type="input" class="form-control" aria-describedby="emailHelp">
          
          <label for="housenum"></label>
          <input name="housenum" disabled="disabled" id="sendNewSms1"  name="sendNewSms" placeholder="House Number"  type="input" class="form-control" aria-describedby="emailHelp">
          
          <label for="famincome"></label>
          <input name="famincome" disabled="disabled" id="sendNewSms2" name="sendNewSms" placeholder="Family Income" type="input" class="form-control" aria-describedby="emailHelp">
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
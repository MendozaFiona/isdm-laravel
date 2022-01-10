<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="userStyle.css">

    
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
      <img class="brgylogo2" src="images/brgylogo.png">
    </div>
  </div>
  <div class="row">
    <div class='col'>
      <h5>BARANGAY NAZARETH RESIDENTIAL INFORMATION SYSTEM</h5>
    </div>
  </div>
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
            <input placeholder="Name" type="name" class="form-control" id="name" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <input placeholder='Password' type="password" class="form-control" id="password" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <input placeholder="Confirm password" type="cpassword" class="form-control" id="cpassword" aria-describedby="emailHelp">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input placeholder="Street No./ Street name/ Lot. No/ Blk No." type="address" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
        </div> 
        <div class="row">
          <div class="col">
            <input placeholder="Email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <input placeholder="Phone number" type="phone" class="form-control" id="phone" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <input placeholder="Birthdate (mm/dd/yy)"  type="birthdate" class="form-control" id="birthdate" aria-describedby="emailHelp">
          </div>
          <div class="col">
            <form action="#">
              <label for="lang">Gender</label>
              <select name="gender" id="lang">
                <option value="f">Female</option>
                <option value="m">Male</option>
                <option value="t">Transgender</option>
                <option value="l">Lesbian</option>
                <option value="x">Preffered not to say</option>
              </select>
        </form>
          </div>
          <div class="col">
          <label for="lang">Status</label>
              <select name="languages" id="lang">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="widow">Widow</option>
              </select>
        </div>
            
        
        <div class="space"></div>
        <div class="space"></div>

        <!-- OCCUPATION FORM -->
        <div class="row-4">
          <div class='col-4'>
          <label for="email" class="form-label">OCCUPATION DETAILS: </label>
          <p class="upid">(UPLOAD ID PICTURE ON THE FOLLOWING)</p>
        </div>
        </div>
        <div>
          <label><input type="radio" id="radio_1" name="colorRadio" value="s"> Student</label>
          <label><input type="radio" name="colorRadio" value="u"> Unemployed</label>
          <label><input type="radio" name="colorRadio" value="e"> Employed</label>
          <label><input type="radio" name="colorRadio" value="se"> Self-employed</label>
      </div>
      <!-- IF STUDENT DISPLAY -->
      <div class="s box">
        <div class="input-group">
              <select name="languages" id="lang">
                <option value="javascript">-- education Stage --</option>
                <option value="javascript">Elementary</option>
                <option value="php">High School</option>
                <option value="java">College</option>
                <option value="golang">TESDA</option>
              </select>
          <input placeholder="Scholarship Name"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input placeholder="ID Number"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <!-- IF UNEMPLOYED -->
      <div class="u box">
        <div class="input-group">
          <select name="languages" id="lang">
            <option value="javascript">-- select one --</option>
            <option value="javascript">PWD</option>
            <option value="php">Senior</option>
            <option value="java">None</option>
          </select>
          <input placeholder="Upload ID according to the selection:"  type="name" class="form-control" id="name" aria-describedby="emailHelp" disabled/>
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <div class="e box">
        <div class="input-group">
          <input placeholder="Occupation #1"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input placeholder="Company Name"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="input-group">
          <input placeholder="Occupation #2"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input placeholder="Company Name"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="input-group">
          <input placeholder="Occupation #3"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input placeholder="Company Name"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <!-- IF SELF-EMPLOYED -->
      <div class="se box">
        <div class="input-group">
          <input placeholder="Business name"  type="name" class="form-control" id="name" aria-describedby="emailHelp"/>
          <input placeholder="Upload business permit (optional):"  type="name" class="form-control" id="name" aria-describedby="emailHelp" disabled/>
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      
            <div class="space"></div>
            <div class="row">
              <div class='col-4'>
              <label for="address" class="form-label">  UPLOAD VALID PROOF OF RESIDENCE:</label>
              </div>
              <div class="col">
                <div class="dropdown-3">
                  <a class="btn btn-secondary dropdown-toggle btns" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Select any valid proof of residence
                  </a>
                  <ul class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">UMID</a></li>
                    <li><a class="dropdown-item" href="#">Driver License</a></li>
                    <li><a class="dropdown-item" href="#">Barangay Certificate</a></li>
                    <li><a class="dropdown-item" href="#">Police ID/Clearance</a></li>
                    <li><a class="dropdown-item" href="#">Water Bill</a></li>
                    <li><a class="dropdown-item" href="#">Electricity Bill</a></li>
                    <li><a class="dropdown-item" href="#">Landline Phone Bill</a></li>
                    <li><a class="dropdown-item" href="#">Postpaid Line Bill</a></li>
                    <li><a class="dropdown-item" href="#">Internet Bill</a></li>
                    <li><a class="dropdown-item" href="#">Bank Statement with Address</a></li>
                    <li><a class="dropdown-item" href="#">Credit Card Statement Account (SoA)</a></li>
                    <li><a class="dropdown-item" href="#">National of Investigation (NBI clearance)</a></li>
                    <li><a class="dropdown-item" href="#">Lease Contract</a></li>

                  </ul>
                </div>
              </div>
             
            
              <div class="col">
                <div class="input-group ig2">
                  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
              </div>
              <div class="row-3">
                <div class="space"></div>
              <div class="row">
                <div class="col-4">
                    <div class="form-check">
                      <input id="checkme" type="radio">  HOUSEHOLD HEAD
                    </div>
              </div>
              <div class="row" >
                <div class="input-group ig3">
                  <input disabled="disabled" id="sendNewSms"  name="sendNewSms" placeholder="Family Name" type="input" class="form-control" aria-describedby="emailHelp">
                  <input disabled="disabled" id="sendNewSms1"  name="sendNewSms" placeholder="House Number"  type="input" class="form-control" aria-describedby="emailHelp">
                  <input disabled="disabled" id="sendNewSms2" name="sendNewSms" placeholder="Family Income" type="input" class="form-control" aria-describedby="emailHelp">
                </div>
            <div class="row">
              
              <div class="d-grid gap-2 col-6 mx-auto">
                <a class="btn btn-warning " href="userdashboard.html" type="button">SUBMIT</a>
              </div>
           
            <div class="space"></div>
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
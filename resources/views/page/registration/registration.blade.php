@extends('page.layout.main')

@section('title')
OBS-Register
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          
          <li><a href="/login">Login</a></li>
          <li class="selected"><a href="/registration">Register</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
  
  <font color="red">
        @foreach($errors->all() as $err)
  ⚠️{{$err}} <br>
@endforeach

<div>
    {{session('msg')}}
  </div>
      </font>

        
</div>
      <div id="content">
        <!-- insert the page content here -->
        
        
     

     <form  method="post">
          <div class="form_settings">
            <p><span>Name</span><input placeholder="The Username should be unique" class="contact" type="text" name="u_name" value="" /></p>

            <p><span>Email Address</span><input placeholder="*"class="contact" type="email" name="u_email" value="" /></p>

           

            <p><span>DOB</span><input  class="contact" type="date" name="u_dob" value="" /></p>

           







            <p>
              <span>Gender</span>
              <select name="u_gender" >
  <option value="male"  >Male</option>
  <option value="female"  >Female</option>
  
              </select  >
            </p>



            <p>
              <span>Registration Type </span>
 <select name="u_type" >
  
  <option value="admin"  >Admin</option>
 <option value="customer"  >Customer</option>

  
              </select>
            </p>




            

            <p><span>Password</span><input placeholder="*" class="contact" type="Password" name="u_password" value="" /></p>
            <p><span>Confirm Password</span><input placeholder="*" class="contact" type="Password" name="uc_password" value="" /></p>

            

          

            
            
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>
      

      
   </div>
  @endsection






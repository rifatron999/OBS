@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li class="selected"><a href="/portal">portal</a></li>
          <li>><a href="/portal/profile">🚹{{session('username')}}</a></li>
        <li><a href="/portal/register/notice"> Notices</a></li>
         <li><a href="/portal/preRegistration"> pre registration</a></li>
          <li><a href="/portal/register/semester">semester</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>portal view for register</h1>
        {{session('type')}} : {{session('username')}}
        
        
      </div>


<form method="post">

  <table border="1">
    <tr><td colspan="4">Offered Cources</td></tr>
    <tr align="center">
      <td>id</td>
      <td>name</td>
      <td>department</td>
      <td>ACTION</td>
    </tr>

    @foreach ($registerReg as $v) 
      <tr>
        <td>{{$v->c_admin_id}}</td>
        <td>{{$v->c_admin_name}}</td>
        <td>{{$v->c_admin_dept}}</td>
        <td>


       
        <a href="/portal/preRegistration/register/{{$v->c_admin_id}} ">Select</a>  
        
         
        </td>
      </tr>
       @endforeach
   
    </table>
   
  </form>

 <!-- room request starts -->

<div class="sidebar">
        
      </div>
      <div id="content">
       
      
      <div class="form_settings">

         <table style="width:100%; border-spacing:2;" border="4">
          <tr><td colspan="4">Room Request</td></tr>
          <tr><td>ID</td><td>Number</td><td>Message</td><td>Faculty</td><td>Date</td></tr>

          @foreach ($roomrequest as $d)

          <tr>
            <td>{{$d->r_id}}</td>
             <td>{{$d->r_number}}</td>
             <td>{{$d->r_message}}</td>
              <td>{{$d->r_faculty}}</td>
                <td>{{$d->r_date}}</td>
            
            
            </tr>

          @endforeach

        </table>
        
      </div>
      </div>







      @endsection




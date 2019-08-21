@extends('page.layout.main')

@section('title')
UMS-portal-Pre Registration
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li class="selected"><a href="/portal/preRegistration">pre registration</a></li>
		  <li><a href="/portal/student/grade_reports">Grade Report</a></li>
		  <li><a href="/portal/student/change_password">Change Password</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
 <font color="red">
        

<div>
    {{session('msg')}}
  </div>
      </font>


      </div>
      
        <!-- insert the page content here -->
        <h1>Pre Registration Student</h1>
       
<!-- table starts -->

<form method="post">

  <table border="1">
    <tr><td colspan="4">Offered Courses</td></tr>
    <tr align="center">
	<td>ID</td>
      <td>COURSE NAME</td>
      <td>DEPARTMENT</td>
      <td>SEMESTER</td>
      <td>SECTION</td>
      <td>ACTION</td>
    </tr>

    @foreach ($stuReg as $s) 
      <tr>
        <td>{{$s->c_faculty_id}}</td>
        <td>{{$s->c_faculty_name}}</td>
        <td>{{$s->c_faculty_dept}}</td>
        <td>{{$s->c_faculty_semester}}</td>
        <td>{{$s->c_faculty_section}}</td>
        <td>

<a href="{{route('preReg.updateStudent',$s->c_faculty_id )}}">Select</a>
         
        </td>
      </tr>
       @endforeach
   
    </table>
   
  </form>

  




<!-- table ends -->



        
        
     
      @endsection
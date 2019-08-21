@extends('page.layout.main')

@section('title')
UMS-notice
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">ðŸš¹{{session('username')}}</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
		  <li><a href="/portal/student/grade_reports">Grade Report</a></li>
          <li class="selected"><a href="/portal/student/notice">Notice</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection
@section('site_content')
<div class="sidebar">
     
  </div>
      
      <div id="content">
        <!-- insert the page content here -->
      @csrf   
		 <form method="post">

  <table align="center" border="1">
    <tr><td colspan="6">Notices</td></tr>
    <tr align="center">
      
	  
	  <td>COURSE ID</td>
      <td>NOTICE</td>
      
      
	  
    </tr>
@foreach ($notice as $s) 
      <tr>
   
        <td>{{$s->n_course_id}}</td>
        <td>{{$s->n_course_notice}}</td>
        
       
		
      </tr>
       @endforeach
   
   
    </table>
   
  </form>
  </div>
  @endsection
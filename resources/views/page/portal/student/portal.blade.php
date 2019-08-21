@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li class="selected"><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
		    <li><a href="/portal/student/grade_reports">Grade Report</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
    
        <!-- insert the page content here -->
        

        <form method="post">

  <table align="center" border="1">
    <tr><td colspan="6">Yours Courses</td></tr>
    <tr align="center">
      <td>COURSE ID</td>
      <td>COURSE NAME</td>
      <td>SECTION</td>
	  <td>FACULTY</td>
      <td>SCHEDULE</td>
	 
    </tr>

    @foreach ($studentCourseList as $s) 
      <tr>
        <td>{{$s->c_student_courseId}}</td>
        <td>{{$s->c_student_name}}</td>
		<td>{{$s->c_student_section}}</td>
        <td>{{$s->c_student_faculty}}</td>
        
        <td>


         <a href="{{route('student.scheduleDetails',$s->c_student_id )}}">ENTER</a>
         
        </td>
		
		
      </tr>
       @endforeach
   
    </table>
   
  </form>
        
        
      
      @endsection
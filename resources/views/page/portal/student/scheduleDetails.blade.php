@extends('page.layout.main')

@section('title')
UMS-portal-SectionDetails
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li class="selected"><a href="{{route('student.scheduleDetails',$studentCourseDetails[0]->c_student_id )}}">Schedule Details</a></li>
		 <li><a href="{{route('student.scheduleDetails.uploadSlide',$studentCourseDetails[0]->c_student_id )}}">upload Assignment</a></li>
		 <li><a href="/portal/student/notice">Notice</a></li>
		 <li><a href="/portal/student/tsf_view">View TSF</a></li>
		 <li><a href="/portal/preRegistration">pre registration</a></li>
	
          <li><a href="/logout">Logout</a></li>
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
      
        <!-- insert the page content here -->
        

        

  
   
    
<table align="left" cellspacing="10" > 
  <tr >
    @foreach ($studentCourseDetails as $s) 
    
       
       <td bgcolor="#1bf798"> COURSE: <mark>{{$s->c_student_name}}</mark></td>
       <td bgcolor="#c2c0c0">ID: <mark>{{$s->c_student_id}}</mark></td>
       <td bgcolor="#22e0e0">SECTION: <mark>{{$s->c_student_section}}</mark></td>
       <td bgcolor="#faa693">FACULTY: <mark>{{$s->c_student_faculty}}</mark></td>
       
       
         
        
       @endforeach
   </tr>
 
	
	
	
  </table>






        
        
     
      @endsection
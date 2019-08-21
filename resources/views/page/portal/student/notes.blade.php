@extends('page.layout.main')

@section('title')
UMS-portal-ScheduleDetails
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">ðŸš¹{{session('username')}}</a></li>
          <li><a href="{{route('student.scheduleDetails',$CourseId)}}">Schedule Details</a></li>
		 <li><a href="{{route('student.scheduleDetails.uploadSlide',$CourseId )}}">upload slide</a></li>
		 <li class="selected"><a href="{{route('student.scheduleDetails.notes',$CourseId )}}">Notes</a></li>
		 <li><a href="/portal/student/tsf_view">View TSF</a></li>
		 <li><a href="/portal/preRegistration">pre registration</a></li>
		  <li><a href="/portal/student/change_password">Change Password</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        <font color="red">
        @foreach($errors->all() as $err)
  âš ï¸{{$err}} <br>
@endforeach

<div>
    {{session('msg')}}
  </div>
      </font>

      </div>
      
        <!-- insert the page content here -->
        <!-- notes uploaded starts -->
        <?php
        if(count($studentSlideList) > 0)
         {
          ?>
		  
		  <table style="width:800px;table-layout:fixed" align="left" border="1" cellspacing="8" > 
  <tr align="center">
      
      <td colspan="3" >NOTES UPLOADED</td>
      
    </tr>
  
    @foreach ($studentSlideList as $s) 
    
       <tr >
      <td style="width:250px;overflow:hidden" bgcolor="#faa693"><mark>{{$s->sli_filename}}</mark></td>
       <td width="30%" bgcolor="#64e885"><mark>{{$s->sli_term}}</mark></td>
       <td><a href="{{asset('upload/slides')}}/{{$s->sli_filename}}">DOWNLOAD</a></td>
       
        </tr>
        
       @endforeach
   
    
  </table>

<?php

          
         }?>

    
        <!-- notes uploaded ends -->
@endsection
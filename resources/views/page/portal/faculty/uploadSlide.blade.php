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
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li><a href="{{route('faculty.sectionDetails',$CourseId)}}">Section Details</a></li>
          
          <li class="selected"><a href="{{route('faculty.sectionDetails.uploadSlide',$CourseId )}}">upload slide</a></li>
          <li><a href="{{route('faculty.sectionDetails.students',$CourseId )}}">Students</a></li>
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
        <!-- previous slides starts -->
        <?php
        if(count($facultySlideList) > 0)
         {
          ?>


<table style="width:800px;table-layout:fixed" align="left" border="1" cellspacing="8" > 
  <tr align="center">
      
      <td colspan="3" >PREVIOUS SLIDES</td>
      
    </tr>
  
    @foreach ($facultySlideList as $s) 
    
       <tr >
      <td style="width:250px;overflow:hidden" bgcolor="#faa693"><mark>{{$s->sli_filename}}</mark></td>
       <td width="30%" bgcolor="#64e885"><mark>{{$s->sli_term}}</mark></td>
       <td><a href="{{asset('upload/slides')}}/{{$s->sli_filename}}">DOWNLOAD</a> <a href="{{route('faculty.sectionDetails.removeSlide',$s->sli_id )}}">REMOVE</a> </td>
       
        </tr>
        
       @endforeach
   
    
  </table>

<?php

          
         }?>

    
        <!-- previous slides ends -->
       
        <!-- upload slides starts -->



<form method="post" enctype="multipart/form-data">
<table style="width:600px;" align="right" border="1" cellspacing="8" > 
  
  <tr align="center">
      
      <td bgcolor="#64e885" colspan="3" >UPLOAD SLIDE</td>
      
    </tr>
    <tr>
      <td bgcolor="#64e885" >
        <input class="a" type="file" name="sli_filename"> </td>


<td bgcolor="#64e885" >
        
<select class="A" name="sli_term" >
  
  <option value="Mid"  >Mid</option>
 <option value="Final"  >Final</option>
 
  
</select>

      </td>




    <td bgcolor="#faa693" ><input type="submit" name="submit" value="upload">
      </td>
      
    </tr>
  
    
   
    
  </table>
  </form>




        <!-- upload slides ends -->








  








        
        
     
      @endsection



      
<style> 
select {
  width: 100%;
  
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}




input[type=submit]  {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 10px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  width: 100%;
}



.a {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>


     
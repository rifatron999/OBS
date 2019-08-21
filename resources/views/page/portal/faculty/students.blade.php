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
          <li><a href="{{route('faculty.sectionDetails',$facultyStudentList[0]->c_student_courseId)}}">Section Details</a></li>
          
          <li><a href="{{route('faculty.sectionDetails.uploadSlide',$facultyStudentList[0]->c_student_courseId )}}">upload slide</a></li>
          <li class="selected" ><a href="{{route('faculty.sectionDetails.students',$facultyStudentList[0]->c_student_courseId )}}">Students</a></li>
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
        
    <!-- STUDENTS starts -->
        <?php
        if(count($facultyStudentList) > 0)
         {
          ?>


<table style="width:600px;" align="left" border="1" cellspacing="8" > 
  <tr align="center">
      
      <td colspan="1" >STUDENTS</td>
      
    </tr>
  
    @foreach ($facultyStudentList as $s) 
    
       <tr >
<!-- fetch student grade starts  -->
<td width="85%"  bgcolor="#64e885">
  <mark onclick="myFunction2
       ('{{$s->c_student_student}}','{{$s->c_student_courseId}}')" > {{$s->c_student_student}}</mark>
</td>
<td width="15%"  bgcolor="#64e885" >
<?php for($x=0;$x<count($StudentGrade);$x++)
{
//echo $StudentGrade[$x]->g_student;

  if($s->c_student_student == $StudentGrade[$x]->g_student && $s->c_student_courseId == $StudentGrade[$x]->g_courseId )
  {
    /*echo $StudentGrade[$x]->g_id;
    echo $StudentGrade[$x]->g_courseId;
    echo $StudentGrade[$x]->g_mid;
    echo $StudentGrade[$x]->g_final;
    echo $StudentGrade[$x]->g_student;*/

?>

      <span onclick="myFunction
       ('{{$s->c_student_student}}','{{$s->c_student_courseId}}','{{$StudentGrade[$x]->g_mid}}','{{$StudentGrade[$x]->g_final}}')">  |✎|  </span> 
       <?php

  }

  else 
  {
    ?>
     
       
        <?php
}


 


} 
?>
</td> 

<!-- fetch student grade ends  -->


      
       
       
       
  </tr>
        
       @endforeach
   
    
  </table>
  <?php
}?>

    
        <!-- STUDENTS ends -->





<!-- GRADES BY SEMESTER statrs -->
<form   method="post">
  <table style="width:600px;table-layout:fixed" align="right" border="1" cellspacing="8" > 
  <tr align="center">
      
      <td colspan="2" >GRADES BY SEMESTER  </td>
      
    </tr>
  
  <tr >
     
     <td width="30%"  bgcolor="#64e885">NAME:  </td> 
  <td width="30%"  bgcolor="#64e885"><mark> <input name="g_student" type="text" id="stdname"  class="a" readonly="readonly"></mark> </td> 

</tr>

       <tr>

        <td width="30%"  bgcolor="#64e885">SECTION ID:  </td>
       <td width="30%"  bgcolor="#64e885"><mark> <input name="g_courseId" value="{{$facultyStudentList[0]->c_student_courseId}}" type="text" id="stdid"  class="a" readonly="readonly"></mark> </td> 
       
</tr>

        <tr >
      
       <td width="30%"  bgcolor="#64e885">MID: <mark id='midMark' ></mark> </td> <!--mid grade here-->
       <td width="30%"  bgcolor="#64e885"><mark> <input name="g_mid" id="stdmarkmid" type="text" class="a" ></mark> </td> 
        
       </tr>

        <tr>
      
       <td width="30%"  bgcolor="#64e885">Final: <mark id='finalMark' ></mark> </td> <!--final grade here-->
       <td width="30%"  bgcolor="#64e885"><mark> <input name="g_final" id="stdmarkfinal" type="text" class="a" ></mark> </td> 
       
       </tr>
      
      <tr>
      
       <td width="30%" bgcolor="#faa693" colspan="2" bgcolor="#64e885"> <input class="submit" type="submit" name="name" value="Submit" /> </td> 
        
       </tr>
        
   
   
    
  </table>
       
        </form>






<script>
function myFunction(name,secId,mid,final) {
  document.getElementById("stdname").value = name ;
  document.getElementById("stdid").value = secId ;
  document.getElementById("stdmarkmid").value = mid ;
  document.getElementById("stdmarkfinal").value = final ;
  
  

if(mid >= 94 && mid <= 100){document.getElementById("midMark").innerHTML  = 'A+' ;}
if(mid >= 90 && mid <= 93){document.getElementById("midMark").innerHTML  = 'A' ;}
if(mid >= 86 && mid <= 89){document.getElementById("midMark").innerHTML  = 'A-' ;}
if(mid >= 82 && mid <= 85){document.getElementById("midMark").innerHTML  = 'B+' ;}
if(mid >= 78 && mid <= 81){document.getElementById("midMark").innerHTML  = 'B' ;}
if(mid >= 74 && mid <= 77){document.getElementById("midMark").innerHTML  = 'B-' ;}
if(mid >= 70 && mid <= 73){document.getElementById("midMark").innerHTML  = 'c+' ;}
if(mid >= 66 && mid <= 69){document.getElementById("midMark").innerHTML  = 'c' ;}
if(mid >= 62 && mid <= 65){document.getElementById("midMark").innerHTML  = 'c-' ;}
if(mid >= 58 && mid <= 61){document.getElementById("midMark").innerHTML  = 'D+' ;}
if(mid >= 54 && mid <= 57){document.getElementById("midMark").innerHTML  = 'D' ;}
if(mid >= 50 && mid <= 53){document.getElementById("midMark").innerHTML  = 'D-' ;}
if(mid < 50 ){document.getElementById("midMark").innerHTML  = 'F' ;}




if(final >= 94 && final <= 100){document.getElementById("finalMark").innerHTML  = 'A+' ;}
if(final >= 90 && final <= 93){document.getElementById("finalMark").innerHTML  = 'A' ;}
if(final >= 86 && final <= 89){document.getElementById("finalMark").innerHTML  = 'A-' ;}
if(final >= 82 && final <= 85){document.getElementById("finalMark").innerHTML  = 'B+' ;}
if(final >= 78 && final <= 81){document.getElementById("finalMark").innerHTML  = 'B' ;}
if(final >= 74 && final <= 77){document.getElementById("finalMark").innerHTML  = 'B-' ;}
if(final >= 70 && final <= 73){document.getElementById("finalMark").innerHTML  = 'c+' ;}
if(final >= 66 && final <= 69){document.getElementById("finalMark").innerHTML  = 'c' ;}
if(final >= 62 && final <= 65){document.getElementById("finalMark").innerHTML  = 'c-' ;}
if(final >= 58 && final <= 61){document.getElementById("finalMark").innerHTML  = 'D+' ;}
if(final >= 54 && final <= 57){document.getElementById("finalMark").innerHTML  = 'D' ;}
if(final >= 50 && final <= 53){document.getElementById("finalMark").innerHTML  = 'D-' ;}
if(final < 50 ){document.getElementById("finalMark").innerHTML  = 'F' ;}







 


}


function myFunction2(name,secId) {
  document.getElementById("stdname").value = name ;
  document.getElementById("stdid").value = secId ;
  document.getElementById("stdmarkmid").value = '' ;
  document.getElementById("stdmarkfinal").value = '' ;
  
}

</script>
  





        
        
     
      @endsection



      
<style> 
select {
  width: 100%;
  
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}

.a {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=submit]  {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  width: 50%;
}



</style>


     
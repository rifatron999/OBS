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
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
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


<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  
  if(x == 'Fall 2019-2020'){
  document.getElementById("mySelect2").disabled=true;
  }
  else{document.getElementById("mySelect2").disabled=false;}

}
</script>

        

       

  <table style="width:800px;" align="left" border="1" cellspacing="10" >
    <tr>
      <td colspan="4"><mark> Yours Cources </mark></td>
      <td colspan="2">
        <select name="c_faculty_semester" id="mySelect"  onchange="myFunction()" >
                <?php

                for ($x = 0; $x <(count($facultySemList)); $x++) {
    echo "<option value='".$facultySemList[$x]->s_type." ".$facultySemList[$x]->s_duration."'>".$facultySemList[$x]->s_type." ".$facultySemList[$x]->s_duration."</option>";
 }
       ?>

  
              </select>
        


      </td>
    </tr>
    <tr align="center" bgcolor="#64e885" >
      <td>COURSE ID</td>
      <td>COURSE NAME</td>
     
      <td>SEMESTER</td>
      <td>SECTION</td>
      <td>STUDENTs</td>
      <td>ENTER</td>
    </tr>

    @foreach ($facultyCourseList as $s) 
      <tr  >


        <td bgcolor="#faa693" >{{$s->c_faculty_id}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->c_faculty_name}}</td>
       
        <td bgcolor="#1bf7f7" >{{$s->c_faculty_semester}}</td>
        <td bgcolor="#faa693" >{{$s->c_faculty_section}}</td>
        <td bgcolor="#1bf7f7" >{{$s->c_faculty_capacity}}</td>
        <td bgcolor="#64e885" >


         <a id="mySelect2" href="{{route('faculty.sectionDetails',$s->c_faculty_id )}}">➥</a>
         
        </td>
      </tr>
       @endforeach
   
    </table>


    <!-- room request table -->
    <form   method="post">
   
  <table  style="width:800px;" align="left" border="1" cellspacing="10" >
   <tr style="outline: thin solid" align="center">
      
      <td  bgcolor="#1bf7f7" colspan="1" > <mark> REQUEST VACANT ROOM </mark></td>
      <td><input  class="b" type='date' id='hasta' name="r_date" value='<?php echo date('Y-m-d');?>'></td>
      
    </tr>
  
    
    

    <tr style="outline: thin solid" >
      <td><p><textarea placeholder="Write notice description here *"  name="r_message"></textarea></p></td>

      <td> 
        <p><input type="number" class="a" placeholder="Write room number here *"  name="r_number"></p>
        <p ><span></span><input class="submit" type="submit" name="name" value="Submit" /></p>

      </td>
     
     </tr>
     
         
        
          
        </table>
        </form>





 
        
        
      
      @endsection


      <style type="text/css">
        textarea {
          display: inline;
    margin-left: auto;
    margin-right: auto;
font: 100% arial; 
  width: 500px;
  height: 80px;
}
 .a {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
.b {
  height: : 50%;
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
}
</style>
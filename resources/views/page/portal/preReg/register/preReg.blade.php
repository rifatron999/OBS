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
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li class="selected"><a href="/portal/preRegistration">pre registration</a></li>
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
<div class="sidebar">
        
 <font color="red">
        

<div>
    {{session('msg')}}
  </div>
      </font>


      </div>
      
        <!-- insert the page content here -->
        
       
<!-- table starts -->


<form method="post">

  <table border="1">
    <tr><td colspan="9">Offered Cources</td></tr>
    <tr align="center">
      <td>id</td>
      <td>name</td>
      <td>department</td>
       <td colspan="3">Semester</td>
       <td>Section</td>
      <td>Status</td>
      <td>ACTION</td>
    </tr>

    @foreach ($registerReg as $v) 
      <tr>
        <td>{{$v->c_admin_id}}</td>
        <td><input type="text" name="c_register_name" value="{{$v->c_admin_name}}" readonly="readonly" ></td>
        <td><input type="text" name="c_register_dept" value="{{$v->c_admin_dept}}" readonly="readonly" ></td>
        
       
         <td colspan="3"> 
          
               <select name="c_register_semester" id="mySelect2">
                <?php

                for ($x = 0; $x <(count($s_semester)); $x++) {
    echo "<option value='".$s_semester[$x]->s_type." ".$s_semester[$x]->s_duration ."'>".$s_semester[$x]->s_type." ".$s_semester[$x]->s_duration."</option>";
 }
       ?>

  
              </select>
           
        </td>
          </div>

        <td>
            <p><input class="notice" type="text" name="c_register_section" value=""></p>
        </td>

        <td>
             <select name="c_register_status" >
               
               
    <option value="0" > PUBLISH</option>";
    <option value="1" > CREATE ONLY</option>";
 

  
              </select>
        </td>
                  
        <td>

            
        <input type="submit" name="submit" value="SUBMIT">
           @endforeach

        </td>
      </tr>
    </table>
   

   
    
   
  </form>


   





  




<!-- table ends -->



        
        
     
      @endsection
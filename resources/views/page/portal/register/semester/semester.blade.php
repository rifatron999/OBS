@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
        <li>><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/register/notice"> Notices</a></li>
          <li class="selected"><a href="/portal/register/semester">semester</a></li>
         
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
      <div id="content">
       <form   method="post">
        <p> <span>Enter the Semester:</span></p>
<select name="s_type" >

<option value="Spring" >Spring</option>
<option value="Summer" >Summer</option>
<option value="Fall" >Fall</option>
</select>
<input type="text" name ="s_duration" >  

<div class="form_settings" style= "float:right" >

      <p ><span></span><input class="submit" type="submit" name="name" value="submit" /></p>
</body>
</html>
       </div> 
      </div>
     


   
<div class="sidebar">
        
      </div>
      <div id="content">
       
      
      <div class="form_settings">

         <table style="width:100%; border-spacing:2;" border="4">
          <tr><td colspan="4">Offered semester</td></tr>
          <tr><td>ID</td><td>Type</td><td>duration</td></tr>
          @foreach ($semester as $value)
          <tr>
            <td>{{$value->s_id}}</td>
             <td>{{$value->s_type}}</td>
             <td>{{$value->s_duration}}</td>
            
            
            </tr>

          @endforeach

        </table>
        
      </div>
      </div>
      @endsection
@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
         
          <li class="selected"><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
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

<h1>Admin view portal</h1>


<table style="width:1200px;" align="left" border="1" cellspacing="10" >
    <tr>
      <td colspan="7"><mark> USER LIST </mark></td>
      
        
        
    </tr>
    <tr align="center" bgcolor="#64e885" >
      <td>USER ID</td>
      <td>USER NAME</td>
     
      <td>USER D-O-B</td>
      <td>USER GENDER</td>
      <td>USER EMAIL</td>
      <td>USER TYPE</td>
      <td>ACTION</td>
    </tr>

    @foreach ($totalUserList as $s) 
      <tr  >


        <td bgcolor="#faa693" >{{$s->u_id}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->u_name}}</td>
       
        <td bgcolor="#1bf7f7" >{{$s->u_dob}}</td>
        <td bgcolor="#faa693" >{{$s->u_gender}}</td>
        <td bgcolor="#1bf7f7" >{{$s->u_email}}</td>
        <td bgcolor="#1bf7f7" >{{$s->u_type}}</td>
        <td bgcolor="#64e885" >

        <?php
        if($s->u_type == 'customer')
        { ?>
           <a  href="{{route('admin.removeUser',$s->u_id )}}">✘</a>
            <?php

        }

?>
        
         
        </td>
      </tr>
       @endforeach
   
    </table>






 
        
        
      
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
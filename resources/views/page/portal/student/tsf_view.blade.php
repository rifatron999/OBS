@extends('page.layout.main')

@section('title')
UMS-tsf view
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">ðŸš¹{{session('username')}}</a></li>
		  <li class="selected"><a href="/portal/student/tsf_view">View TSF</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
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
    <tr><td colspan="6">TSF</td></tr>
    <tr align="center">
      
	  
	  <td>Faculty Name</td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  
    </tr>
@foreach ($tsf_view as $s) 
      <tr>
   
        <td>{{$s->t_name}}</td>
       <td>{{$s->t_sun}}</td>
	   <td>{{$s->t_mon}}</td>
	   <td>{{$s->t_tue}}</td>
	   <td>{{$s->t_wed}}</td>
		
      </tr>
       @endforeach
   
   
    </table>
   
  </form>
  </div>
  @endsection
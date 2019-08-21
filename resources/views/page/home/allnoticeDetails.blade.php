@extends('page.layout.main')

@section('title')
UMS-Home
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected" ><a href="/home">Home</a></li>
          <li><a href="/login">Login</a></li>
          <li><a href="/registration">Register</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>NOTICE DETAILS</h1>
        
        
        

      <div class="form_settings">

         <table style="width:100%; border-spacing:2;" border="4">
          <tr><td>ID</td><td>Title</td><td>description</td></tr>
          @foreach ($allnotice as $w)
          <tr>
            <td>{{$w->n_id}}</td>
             <td>{{$w->n_title}}</td>
             <td>{{$w->n_description}}</td>
            
            </tr>

          @endforeach

        </table>
        
      </div>
      </div>
      @endsection
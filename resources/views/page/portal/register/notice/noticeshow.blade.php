@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li ><a href="/portal">portal</a></li>
         <li>><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li class="selected" ><a href="/portal/register/notice">Notices</a></li>
          <li><a href="/portal/register/notice/insert">insert</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>portal view for register</h1>
        {{session('type')}} : {{session('username')}}
        
        

      <div class="form_settings">

         <table style="width:100%; border-spacing:2;" border="4">
           <tr><td colspan="4">Notices</td></tr>
          <tr><td>ID</td><td>Title</td><td>description</td><td>action</td></tr>
          @foreach ($notice as $value)
          <tr>
            <td>{{$value->n_id}}</td>
             <td>{{$value->n_title}}</td>
             <td>{{$value->n_description}}</td>
            
              <td><a href="/portal/register/notice/delete/{{$value->n_id}}"><button>Delete</button>
            </tr>

          @endforeach

        </table>
        
      </div>
      </div>
      @endsection
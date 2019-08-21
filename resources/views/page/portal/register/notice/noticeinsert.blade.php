@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li class="selected"><a href="/portal">portal</a></li>
       <li>><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/register/notice">Notices</a></li>
    <li class="selected"><a href="/portal/register/notice/insert" >insert</a></li>
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
        <!-- insert the page content here -->
 <form  method="post">
          <div class="form_settings">
                                <h3>Notice Insertion </h3>
            <p><span>Title</span><input class="notice" type="text" name="n_title" value="" /></p>
            <p><span>Description</span><input class="notice" type="text" name="n_description" value="" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="name" value="submit" /></p>
          </div>
        </form>

      </div>




      </div>
      @endsection
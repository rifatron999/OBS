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
<div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        
        <h3>Notices</h3>
        <ul>
          <?php
          for($x=0;$x<2;$x++)
            { ?>

          <li><a href="/home/noticeDetails/{{$notice[$x]->n_id}}">{{$notice[$x]->n_title}}</a></li>
          <?php } ?>
          <br>

          <li><a href="/home/allnoticeDetails">See all</a></li>
        </ul>
        <h3>calender</h3>

        
        <li><a href ="/home/download">Download academic calender"</a></li>


  @endsection
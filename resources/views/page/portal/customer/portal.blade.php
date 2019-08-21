@extends('page.layout.main')

@section('title')
OBS-portal
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

<h1>Customer view portal</h1>

  <form   method="post">
<table style="width:500px;" align="left" border="1" cellspacing="10" >
    <tr>
      <td colspan="7"><mark> CHOOSE BOOK CATEGORY  </mark></td>

    </tr>

    <tr>
      <td>


<select  name="b_category" id="mySelect2">
                <?php

                for ($x = 0; $x <(count($categoryList)); $x++) {
    echo "<option value='".$categoryList[$x]->c_category."'>".$categoryList[$x]->c_category."</option>";
 }
       ?>

  
              </select>
              </td>

              </tr>

              <tr>
      <td>



              <p ><span></span><input class="submit" type="submit" name="name" value="Submit" /></p>

</td>

              </tr>

            </table>
          </form>




          <table style="width:400px;" align="left" border="1" cellspacing="10" >
    <tr>
      <td colspan="7"><mark> Book LIST </mark></td>
      
        
        
    </tr>
    <tr align="center" bgcolor="#64e885" >
      <td>ID</td>
      <td>NAME</td>
      <td>CATEGORY</td>
      <td>PRICE</td>
      <td>AUTHOR</td>
      <td>DESCRIPTION</td>
     
     
    </tr>

    @foreach ($bookList as $s) 
      <tr  >


        <td bgcolor="#faa693" >{{$s->b_id}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->b_name}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->b_category}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->b_price}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->b_author}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->b_description}}</td>
       
        
        
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
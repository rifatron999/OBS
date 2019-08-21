@extends('page.layout.main')

@section('title')
UMS-Add Book
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
         
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li ><a href="{{route('admin.addCategoryView')}}">ADD CATEGORY</a></li>
          <li class="selected" ><a href="{{route('admin.addBookView')}}">PUBLISH BOOK</a></li>

         

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





    <table  style="width:500px;" align="center" border="1" cellspacing="10" >
   <tr style="outline: thin solid" align="center">
      
      <td colspan="2" >ADD NEW BOOK</td>
      
    </tr>
  <form   method="post">
    
    

    <tr style="outline: thin solid" ><td colspan="1" > <p><input class="a" placeholder="Write new book name here *"  name="b_name"></p></td>
      <td colspan="1"  >
        <select name="b_category" id="mySelect2">
                <?php

                for ($x = 0; $x <(count($categoryList)); $x++) {
    echo "<option value='".$categoryList[$x]->c_category."'>".$categoryList[$x]->c_category."</option>";
 }
       ?>

  
              </select>

      </td>
     
     </tr>



     <tr style="outline: thin solid" ><td> <p><input type="number" class="a" placeholder="price here *"  name="b_price"></p></td>
     
     



     <td> <p><input class="a" placeholder="author name here *"  name="b_author"></p></td>
     
     </tr>



     <tr style="outline: thin solid" ><td colspan="3" > <p><input class="a" placeholder="description  here *"  name="b_description"></p></td>
     
     </tr>









     <br>

            <tr style="outline: thin solid" >

            

            <td colspan="3" ><p ><span></span><input class="submit" type="submit" name="name" value="Submit" /></p> </td></tr>
          
        
          </form>
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
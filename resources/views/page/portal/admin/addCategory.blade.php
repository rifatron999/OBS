@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
         
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li class="selected"><a href="{{route('admin.addCategoryView')}}">ADD CATEGORY</a></li>
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


<table style="width:300px;" align="left" border="1" cellspacing="10" >
    <tr>
      <td colspan="7"><mark> Category LIST </mark></td>
      
        
        
    </tr>
    <tr align="center" bgcolor="#64e885" >
      <td>ID</td>
      <td>Category</td>
     
     
    </tr>

    @foreach ($categoryList as $s) 
      <tr  >


        <td bgcolor="#faa693" >{{$s->c_id}}</td>
        <td  bgcolor="#1bf7f7" >{{$s->c_category}}</td>
       
        
        
      </tr>
       @endforeach
   
    </table>





    <table  style="width:500px;" align="center" border="1" cellspacing="10" >
   <tr style="outline: thin solid" align="center">
      
      <td colspan="2" >ADD Category</td>
      
    </tr>
  <form   method="post">
    
    

    <tr style="outline: thin solid" ><td> <p><input class="a" placeholder="Write new category here *"  name="c_category"></p></td>
     
     </tr>
     <br>

            <tr style="outline: thin solid" >

            

            <td><p ><span></span><input class="submit" type="submit" name="name" value="Submit" /></p> </td></tr>
          
        
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
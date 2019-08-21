@extends('page.layout.main')

@section('title')
OBS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
         
          <li class="selected"><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="{{route('customer.myCart',session()->get('username'))}}">🛒</a></li>
          
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
<table style="width:800px;" align="center"  cellspacing="10" >
    <tr>
      <td colspan="7">BOOKs DETAILS: <mark> {{$bookDetailsById[0]->b_name}}</mark> </td>
      <td>
           <a  href="{{route('customer.addToCart',$bookDetailsById[0]->b_id)}}">🛒</a>
            
        
         
        </td>
      
        
        
    </tr>
   

    @foreach ($bookDetailsById as $s) 
      <tr  >


        <td bgcolor="#faa693" >ID: <mark>{{$s->b_id}}</mark></td>
        <td  bgcolor="#1bf7f7" >CATEGORY: <mark>{{$s->b_category}}</mark></td>

      </tr>

      <tr>

        <td  bgcolor="#1bf7f7" >PRICE : <mark>{{$s->b_price}}</mark></td>
        <td  bgcolor="#1bf7f7" >AUTHOR NAME: <mark>{{$s->b_author}}</mark></td>
        </tr>

        <tr>
       
        <td  colspan="2" bgcolor="#1bf7f7" >DESCRIPTION: <mark>{{$s->b_description}}</mark></td>
        </tr>

        <tr>
       
        

        </tr>
      
       @endforeach
   
    </table>

          </form>




 
        
        
      
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
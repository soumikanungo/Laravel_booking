<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Business</title>
  </head>
  <body>
    <h2><u>All Clients</u></h2>
    <br/>
    <a class="btn btn-danger"  href="{{ route('delSelected') }}" id="del_Selected">Delete All Selected</a>
    <a class="btn btn-info"  href="{{route('createClients')}}">Add Client</a>
    <br/><br/>
    <form action="{{route('allClients')}}" method="GET">
    <a class="btn btn-primary"  href="{{route('allClients')}}" style="float:left">Reset</a>
    <div class="pull-right" style="float:right">
    <input type="search" name="search" id="search"   placeholder="search...." style="height: 40px;width: 200px;border-radius: 10px;">
    <button class="btn btn-primary" style="height: 40px;width: 90px;border-radius: 10px;">Search</button></div>
    </form>

<table class="table  table-bordered"  id="table">
    <tr>
      <th><input type="checkbox" name=""  id="selectAll_ids" ></th>
        <th>Sl no.</th>
        <th>Name</th>
        <th>Email</th>
        <th>IP_Address</th>
        <th>Deadline</th>
        <th>Image</th>
        <th>Actions</th>
        
        
    </tr>
    @foreach($clients as $client)
        <tr id="client_ids{{ $client->id }}">
          <td><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{$client->id}}"></td>
            <td>{{++$i}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->ip}}</td>
            <td>{{$client->deadline}}</td>
            <td style="width: 20%" class="text-center">
    <img src="{{asset('storage/app/public/images/'.$client->image)}}" />
  </td>
  <td><form action="{{route('destroy',$client->id)}}" method="POST">
                    <a class="btn btn-success" href="{{route('edit',$client->id)}}">Edit</a>
                    <a class="btn btn-info" href="{{ route('getLocation',$client->id) }}">GetLocation</a>
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    
                    </form></td>

    </tr>
    @endforeach
</table> 

<script>

  $(function(e){

  $("#selectAll_ids").click(function(){
      $('.checkbox_ids').prop('checked',$(this).prop('checked'));
  });
  $("#del_Selected").click(function(e){
      $('.checkbox_ids').prop('checked',$(this).prop('checked'));
      e.preventDefault();
      var all_ids = [];
      $('input:checkbox[name=ids]:checked').each(function(){
        all_ids.push($(this).val());
      });
      $.ajax({
        url:"{{ route('delSelected') }}",
        type:"DELETE",
        data:{
          ids:all_ids,
          _token:'{{csrf_token()}}'
        },
        success:function(response){
          $.each(all_ids,function(key,val){
                $('client_ids'+val).remove();
          })
        },
      });
  });
});

</script>
</body>
</html>
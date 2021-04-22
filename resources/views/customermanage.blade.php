@extends('master')
@section('pageheader')
<h2>Customer</h2>
@stop
@section('maincontent')
<div class="row">
  <div class="col">
    <section class="card">
      @if(Auth::user()->user_type == 'admin')
      <header class="card-header">
        <a href="{{ route('addcustomer') }}" class="btn btn-primary btn-sm pull-right">Add Customer</a>
        <h2 class="card-title">Customer</h2>
        @endif
      </header>
      <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-danger">{{ Session::get('success') }}</div>
        @endif     
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif 
        <table id="customertable" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover dataTable" aria-describedby="datatable1_info">
          <thead>
                <tr>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Code</th>
                  @if(Auth::user()->user_type == 'admin')
                  <th>Edit</th>
                  <th>Delete</th>
                  @endif
              </tr>
          </thead>
          <tbody>
            @foreach ($records as $key => $record)
            <tr>
                <td>{{ ucfirst($record->name) }}</td>
                <td>{{ $record->phone }}</td>
                 <td>{{ $record->email }}</td>
                <td>{{ $record->code }}</td>
                @if(Auth::user()->user_type == 'admin')
               <td><a href="{{route('editcustomer',['id'=>$record->id])}}"><span class="btn btn-xs btn-primary">Edit</span></a></td>

              <td><span class="btn btn-xs btn-primary delete"  data-id="{!!$record->id!!}" id="">Delete</span></td>
                @endif
            </tr>                     
              
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
@stop

@section('javascript')
<script type="text/javascript">
  // $(document).ready(function(){
  //  $("#datatable-default").dataTable();
  // });
    $(document).ready(function(){
            $("#customertable").dataTable();
         });

  $(document).on('click', '.delete', function(){
    var clicked = $(this);
    var id = clicked.attr('data-id');
    bootbox.confirm("Are you sure delete this Customer?", function(result){
            if(result == true){
        $.ajax({
          type: 'POST',
          url: '{!! route('deletecustomer') !!}',
          data: {id:id},
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'), },
          dataType: 'json',
          success:function(data){
            if(data.status=='success'){
              alert('Customer Deleted successfully')
              clicked.closest('tr').hide();
            }   
          },
          error:function(e){
            console.log(e.responseText);
            return false;
          }
        });/* end of ajax */
      }
    });
      
    
  });/* end of delete click function */

  /* end of ready function */
</script>
@stop
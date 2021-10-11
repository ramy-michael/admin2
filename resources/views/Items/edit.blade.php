<style>
    .wrapper .row .col-lg-12 .panel .panel-body .row .col-lg-12 .form-horizontal .row .form-control{
        width: 40%;
        float: right;
    }
    @media(max-width: 562px){
        .wrapper .row .col-lg-12 .panel .panel-body .row .col-lg-12 .form-horizontal .row .form-control{
            width: 50%;
            float: right;
        }
    }
</style>
@extends('layouts.app')

@section('title', 'Edit item')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="height: 250px;">
                    <div class="panel-heading">Edit item</div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                      <!--  <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('items/update/'.$item->id) }}">-->
                            <form class="form-horizontal" enctype="multipart/form-data" action = "updateItem" method = "post" style="padding: 0 30px 0 0;">

                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="row {{ $errors->has('name') ? ' has-error' : '' }}" style="float: right;margin-top: 20px;width:100%;">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <input type="hidden"  id="item_id" value="{{$item->id }}">

                                    <label for="name" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الاسم</label>
                                    {{-- <div class="col-lg-11" style="margin-bottom: 15px;"> --}}
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{$item->name}}"
                                            required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    {{-- </div> --}}
                                    
                                </div>

                                <div class="row {{ $errors->has('quantity') ? ' has-error' : '' }}" style="float: right;margin-top: 20px;width:100%;">
                                    
                                    <label for="quantity" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الكود</label>
                                    {{-- <div class="col-lg-11" style="margin-bottom: 15px;"> --}}
                                        <input id="quantity" type="text" class="form-control" name="quantity"
                                            value="{{$item->quantity}}"
                                            required autofocus>

                                        @if ($errors->has('quantity'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @endif
                                    {{-- </div> --}}
                                    
                                </div>

                                <div class="row" style="float: right;margin-top: 20px;width:100%;">
                                    {{-- <div class="col-md-8 col-md-offset-4"> --}}
                                        <button type="button" onclick="update()" class="btn btn-primary">
                                            تعديل
                                        </button>

                                        <a class="btn btn-link" href="{{ url('Items') }}">
                                            الغاء
                                        </a>
                                    {{-- </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

function update()
{


  $.ajax({
    url: "{{ URL::to('updateItem') }}",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "quantity":$('#quantity').val(),"id":$('#item_id').val()},
    success: function(response)
    {
      //if(response['errors'])
    //  {
if(response.status=="success"){
  window.location.href = "/Items";

}else{

}

    /*  if(response['errors'].phone)
      {var html="";
        for(var i=0;i<response['errors'].phone.length;i++){
        html+=''+response["errors"].phone[i]+'<br>'
      }
        $("#olddoctor_phoneinvalid").html(html);
      }
      if(response['errors'].type)
      {
        $("#olddoctor_typeinvalid").html(response['errors'].type);
      }
      if(response['errors'].docName)
      {
        $("#olddoctor_nameinvalid").html(response['errors'].docName);
      }

    }
      else if(response.success)
      {*/
      //  location.reload();
    //  }
    //  location.reload();
    //window.location.replace("items");




   }



    });

}
</script>
@endsection

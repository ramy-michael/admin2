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

@section('title', 'Edit Package')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="height: 300px;">
                    <div class="panel-heading">Edit Package</div>

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
                              action="{{ url('Packages/update/'.$Package->id) }}">-->
                            <form class="form-horizontal" enctype="multipart/form-data" action = "updatePackage" method = "post" style="padding: 0 30px 0 0;">

                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="row {{ $errors->has('name') ? ' has-error' : '' }}" style="float: right;margin-top: 20px;width:100%;">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <input type="hidden"  id="Package_id" value="{{$Package->id }}">

                                    <label for="name" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الاسم</label>
                                    {{-- <div class="col-lg-11" style="margin-bottom: 15px;"> --}}
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{$Package->name}}"
                                            required autofocus style="width: 40%">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    {{-- </div> --}}
                                    
                                </div>

                                <div class="row {{ $errors->has('quantity') ? ' has-error' : '' }}" style="float: right;margin-top: 20px;width:100%;">

                                    <label for="quantity" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الكميه</label>
                                    {{-- <div class="col-lg-11" style="margin-bottom: 15px;"> --}}
                                        <input id="quantity" type="text" class="form-control" name="quantity"
                                            value="{{$Package->quantity}}"
                                            required autofocus style="width: 40%">

                                        @if ($errors->has('quantity'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @endif
                                    {{-- </div> --}}
                                    
                                </div>
                                <div class="row {{ $errors->has('weight') ? ' has-error' : '' }}" style="float: right;margin-top: 20px;width:100%;">

                                    <label for="weight" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الوزن</label>
                                    {{-- <div class="col-lg-11" style="margin-bottom: 15px;"> --}}
                                        <input id="weight" type="text" class="form-control" name="weight"
                                            value="{{$Package->weight}}"
                                            required autofocus style="width: 40%">

                                        @if ($errors->has('weight'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                        @endif
                                    {{-- </div> --}}
                                    
                                </div>
                                <div class="row" style="float: right;margin-top: 20px;width:100%;">
                                    {{-- <div class="col-md-8 col-md-offset-4"> --}}
                                        <button type="button" onclick="update()" class="btn btn-primary">
                                            تعديل
                                        </button>

                                        <a class="btn btn-link" href="{{ url('Packages') }}">
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
    url: "{{ URL::to('updatePackage') }}",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "weight":$('#weight').val(),
    "quantity":$('#quantity').val(),"id":$('#Package_id').val()},
    success: function(response)
    {
      //if(response['errors'])
    //  {
if(response.status=="success"){
  window.location.href = "/Packages";

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
    //window.location.replace("Packages");




   }



    });

}
</script>
@endsection

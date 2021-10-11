@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight" style="height: 480px;">
        <div class="row" style="height: 100%">
            <div class="col-md-8 col-md-offset-2" style="height: 100%">
                <div class="panel panel-default" style="height: 100%">
                    <div class="panel-heading">Edit Client</div>

                    <div class="panel-body" style="height: 100%">
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

                        <div class="row" style="height: 100%">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="height: 100%">

                      <!--  <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('Clients/update/'.$Client->id) }}">-->
                              <form class="form-horizontal" enctype="multipart/form-data" action = "updateClient" method = "post" style="height: 100%">

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="{{ $errors->has('name') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="name" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">الاسم</label>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <input type="hidden"  id="Client_id" value="{{$Client->id }}">

                                {{-- <div class="col-md-6"> --}}
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$Client->name}}" style="width: 70%;float: right"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                {{-- </div> --}}
                            </div>
                            <div class="{{ $errors->has('code') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="code" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">الكود</label>

                                {{-- <div class="col-md-6"> --}}
                                    <input id="code" type="text" class="form-control" name="code"
                                           value="{{$Client->code}}" style="width: 70%;float: right"
                                           required autofocus>

                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                {{-- </div> --}}
                            </div>
                            <div class="{{ $errors->has('balance') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="balance" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">balance</label>

                                {{-- <div class="col-md-6"> --}}
                                    <input id="balance" type="text" class="form-control" name="balance"
                                           value="{{$Client->balance}}" style="width: 70%;float: right"
                                           required autofocus>

                                    @if ($errors->has('balance'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('balance') }}</strong>
                                    </span>
                                    @endif
                                {{-- </div> --}}
                            </div>
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="phone"   class=" control-label" style="float: right;width: 25%;margin-left: 10px;">التليفون</label>

                                {{-- <div class="col-md-6"> --}}
                                    <input id="phone" type="text" value="{{$Client->phone}}" class="form-control" style="width: 70%;float: right" name="phone" autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                {{-- </div> --}}
                            </div>

                            <div class="{{ $errors->has('address1') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="address1" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">
                                    العنوان</label>

                                {{-- <div class="col-md-6"> --}}
                                    <input id="address1" type="text" value="{{$Client->address1}}"class="form-control" style="width: 70%;float: right"
                                           name="address1" autofocus>
                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                    @endif
                                {{-- </div> --}}
                            </div>





                            <div class="col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                {{-- <div class="col-md-8 col-md-offset-4"> --}}
                                    <button type="button" onclick="update()" class="btn btn-primary">
                                        Update
                                    </button>

                                    <a class="btn btn-link" href="{{ url('Clients') }}">
                                        Cancel
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
    url: "{{ URL::to('updateClient') }}",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "phone":$('#phone').val(),
    "address1":$('#address1').val(),
    "balance":$('#balance').val(),
    "code":$('#code').val(),"id":$('#Client_id').val()},
    success: function(response)
    {
      //if(response['errors'])
    //  {
if(response.status=="success"){
  window.location.href = "/Clients";

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
    //window.location.replace("Clients");




   }



    });

}
</script>
@endsection

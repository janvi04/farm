@extends('layouts.appadmin')

@section('content')
    
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Product</h4>
          {!!Form::open(['action'=>'App\Http\Controllers\AdminController@addproduct','class'=>'cmxform','method'=>'POST','id'=>'commentForm'])!!}
            {{csrf_field()}}
              <div class="form-group">
               
                {{Form::label('','Description One',['for'=>'cname'])}}
                {{Form::text('description_one','',['class'=>'form-control'])}}
            </div>
                <div class="formgroup">
                    {{Form::label('','Description Two',['for'=>'cname'])}}
                    {{Form::text('description_two','',['class'=>'form-control'])}}
               
            </div>


                <div class="formgroup">
                    {{Form::label('','Slider Image')}}
                {{Form::file('slider_image',['class'=>'form-control'])}}

            </div>
            
            <div class="formgroup">
                
                {{Form::label('','Slider Status',['for'=>'cname'])}}
                {{Form::checkbox('slider_status','','true',['class'=>'form-control'])}}
            
            </div>

            
           
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
  @endsection
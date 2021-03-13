@extends('layouts.appadmin')

@section('content')

@section('title')
    Add Slider
@endsection
    
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Slider</h4>
          {!!Form::open(['action'=>'App\Http\Controllers\AdminController@addslider','class'=>'cmxform','method'=>'POST','id'=>'commentForm'])!!}
            {{csrf_field()}}
              <div class="form-group">
               
                {{Form::label('','Product Name',['for'=>'cname'])}}
                {{Form::text('product_name','',['class'=>'form-control'])}}

                <div class="formgroup">

                {{Form::label('','Product Price',['for'=>'cname'])}}
                {{Form::number('product_price','',['class'=>'form-control'])}}
            </div>

            <div class="formgroup">
                {{Form::label('','Product Category')}}
                {{Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Select a category','class'=>'form-control'])}}



            </div>


                <div class="formgroup">

                {{Form::file('product_image',['class'=>'form-control'])}}

            </div>
            
            <div class="formgroup">
                
                {{Form::label('','Product Status',['for'=>'cname'])}}
                {{Form::checkbox('product_name','Status',['class'=>'form-control'])}}
            
            </div>

            
            </div>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
  @endsection
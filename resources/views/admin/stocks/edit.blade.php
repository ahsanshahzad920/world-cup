@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Stock
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stocks.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">Product</label>
                <select class="form-control" name="id_product">
                      <option>Please select product.</option>
                      @if(!$products->isEmpty())
                      @foreach($products as $warehouse)
                      <option value="{{$warehouse->id}}" @if($warehouse->id == $user->id_product) selected @endif>{{$warehouse->name}}</option>
                      @endforeach
                      @endif
                </select>
            </div>
            <div class="form-group">
                <label class="required" for="first_name">Warehouse</label>
                <select class="form-control" name="id_warehouse">
                      <option>Please select warehouse.</option>
                      @if(!$warehouses->isEmpty())
                      @foreach($warehouses as $warehouse)
                      <option value="{{$warehouse->id}}" @if($warehouse->id == $user->id_warehouse) selected @endif>{{$warehouse->name}}</option>
                      @endforeach
                      @endif

                </select>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">Quantity</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $user->quantity) }}" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <!-- <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span> -->
            </div>
          
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
@extends('layouts.home_admin')

@section('title', 'Ca sĩ')

@section('sidebar')
@parent
<p>Ca sĩ.</p>
@endsection

@section('content')
<div class="col-12">

    <form action="{{ route('singer.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-user" aria-hidden="true"></i> Tên
                ca sĩ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Hồ Ngọc Hà..."
                    aria-describedby="validationTooltipUsernamePrepend" name="singername" required value="{{old('singername')}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-sticky-note"
                    aria-hidden="true"></i> Ghi chú</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note" alue="{{old('note')}}"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="active" checked>
                    <label class="custom-control-label" for="customCheck1">Sử dụng</label>
                </div>
            </div>
        </div>
        @include('admin.checkErrorForm')
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
@endsection
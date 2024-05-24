@extends("dashboard.layouts.layout")
@section("body")
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('adminassets/form.css')}}" rel="stylesheet"></head>
<body>
    <h3>{{ __("words.settings") }} </h3>
{{-- <form action="{{route("dashboard.settings.update")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="logo">logo</label>
    <input type="file" name="logo" id="logo" ><br>
    <label for="favicon">favicon</label>
    <input type="file" name="favicon" id="favicon">
    <label for="facbook">facbook</label>
    <input type="text" name="facbook" id="facbook">
    <label for="instgram">instgram</label>
    <input type="text" name="instgram" id="instgram">
    <label for="email">email</label>
    <input type="email" name="email" id="email">
    <label for="phone">phone</label>
    <input type="text" name="phone" id="phone">
    <label for="address">address</label>
    <input type="text" name="address" id="address">
    <div class="tab-group">
        <ul class="nav nav-tabs mb-3" id="language-tabs" role="tablist">
            @foreach (config("app.languages") as $key => $value)
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if ($loop->first) active @endif"  id="{{ $key }}" data-mdb-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $value }}</a>
                </li>
            @endforeach
        </ul>
    </div>
        @foreach ( config("app.languages")  as $key=>$value)
        <div class="tab-pane fade  @if ($loop->index==0) show active in @endif"  data-tab="{{$key }}"  id="{{ $key }}"  for="{{$key}}" role="tab-pane">
            <label>{{__("word.title")}}</label>
            <input type="text"  name='{{$key}}[title]' >
            <label >{{__('word.content')}}</label>
            <input type="text"  name='{{$key}}[content]' >

        </div>
        @endforeach
    <button type="submit">submit</button>
    <button type="reset">reset</button>
</form> --}}
{{-- {{ dd($settings) }} --}}
<form action="{{route("dashboard.settings.update")}}" method="POST" enctype="multipart/form-data" class="settings-form">
    @csrf
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="file" name="logo" id="logo" class="form-control" value="{{ $settings->logo }}">
        <img src="{{ asset($settings->logo ) }}">
    </div>
    <div class="form-group">
        <label for="favicon">Favicon:</label>
        <input type="file" name="favicon" id="favicon" class="form-control" value="{{ $settings->favicon }}">
        <img src="{{ asset($settings->favicon) }}">
    </div>
    <div class="form-group">
        <label for="facebook">Facebook:</label>
        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $settings->facebook }}">
    </div>
    <div class="form-group">
        <label for="instagram">Instagram:</label>
        <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $settings->instagram }}">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $settings->email }}">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ $settings->phone }}">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" class="form-control" value="{{ $settings->address }}">
    </div> 
    <div class="tab-group">
        <ul class="nav nav-tabs mb-3" id="language-tabs" role="tablist">
            @foreach (config("app.languages") as $key => $value)
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if ($loop->first) active @endif"  id="{{ $key }}" data-mdb-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $value }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    @foreach (config("app.languages") as $key => $value)
        <div class="tab-pane fade @if ($loop->index==0) show active in @endif" data-tab="{{$key }}" id="{{ $key }}" for="{{$key}}" role="tab-pane">
            <div class="form-group">
                <label for="{{$key}}-title">{{__("word.title")}}</label>
                <input type="text"  name="{{$key}}[title]" id="{{$key}}-title" class="form-control" value="{{ $settings->translate($key)->title}} ">
            </div>
            <div class="form-group">
                <label for="{{$key}}-content">{{__('word.content')}}</label>
                <input type="text"  name="{{$key}}[content]" id="{{$key}}-content" class="form-control" value="{{ $settings->translate($key)->content}}  ">
            </div>
        </div>
    @endforeach
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>

</form>

</body>
</html>

@endsection

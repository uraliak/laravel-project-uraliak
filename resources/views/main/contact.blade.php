@extends ('layout')
@section ('content')
<div style = 'color:black; margin-left:-350px; margin-top: 30px; font-size: 18px'>
    <p style = 'margin-bottom: 20px'>University: {{$data['name']}}</p>
    <p style = 'margin-bottom: 20px'>Address: {{$data['address']}}</p>
    <p>Phone: {{$data['phone']}}</p>
</div>
@endsection



@extends('dashboard.layout.main')
@section('content')
    @if(isset($profile))
        No. Kad Pengenalan: {{ $profile['identification_number'] }} <br>
        No. Telefon Peribadi: {{ $profile['phone_number'] }} <br>
        Tarikh Lahir: {{ $profile['date_of_birth'] }} <br>
        Tempat Lahir: {{ $profile['place_of_birth'] }} <br>
        Alamat Rumah: {{ $profile['home_address'] }} <br>
        Nama Penjaga: {{ $profile['guardian_name'] }} <br>
        No. Telefon Penjaga: {{ $profile['guardian_phone_number'] }} <br>
        
    @else
        No. Kad Pengenalan:  <br>
        No. Telefon Peribadi:  <br>
        Tarikh Lahir:  <br>
        Tempat Lahir:  <br>
        Alamat Rumah:  <br>
        Nama Penjaga:  <br>
        No. Telefon Penjaga:  <br>
    @endif
    <img src="{{ asset('/storage/img/profile/' . $username . '.jpg') }}" alt="" class="img-fluid img-thumbnail">
    <a href="{{ route('profile.update', ['username' => $username]) }}" class="btn btn-primary">Kemas Kini</a>
@endsection

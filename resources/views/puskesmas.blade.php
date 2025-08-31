@extends('shared.main')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Register Antrian Puskesmas</h1>
        @include('flash::message')
    </div>

    <div class="container">
        <div class="cta-form">
            <h2>Isi Form!</h2>
            <p>Untuk detail bisa di baca di bawah.</p>
        </div>
        <form action="{{ route('RegisterPuskesmas') }}" class="form" method="POST">
            @csrf
            <input type="text" placeholder="Name" class="form__input" id="name" name="company_name" />
            <label for="name" class="form__label">Nama Puskesmas</label>

            <input type="text" placeholder="Email" class="form__input" id="alamat" name="alamat" />
            <label for="email" class="form__label">Alamat Puskesmas</label>

            <button type="submit" class="btn btn-primary">Register!</button>
        </form>
    </div>

    <div class="explanation">
        <p>
            <hr>
        </p>
        <ul>
            <li>Input Nama Puskesmas</li>
            <li>Input Alamat Puskesmas.</li>
            <li>Klik Tombol Register.</li>
            <li>Lalu masuk ke folder aplikasi anda di <b style="color: red"><i>
                        {{ public_path('register_puskesmas') }}</i></b></li>
            <li>Copy Folder-folder yang memiliki nama cabang yang anda registrasikan sebelumnya.</li>
            <li>SELESAI :).</li>
        </ul>
    </div>
@endsection

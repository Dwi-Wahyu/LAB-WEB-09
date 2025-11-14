@extends('layouts.master')

@section('title', 'Kuliner Khas Makassar')

@section('content')
    <h2 style="text-align: center; color: #007bff;">Kuliner Khas Makassar yang Legendaris</h2>
    <p style="text-align: center; margin-bottom: 30px;">Nikmati cita rasa khas Kota Daeng yang kaya rempah.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        
        {{-- Kuliner 1: Coto Makassar --}}
        <x-card-destinasi 
            judul="Coto Makassar"
            deskripsi="Sup daging dan aneka jeroan sapi yang dimasak dengan 40 jenis rempah (rampah patang pulo). Biasanya disantap dengan ketupat yang disebut burasa atau buras."
            gambar="coto.webp"
        />

        {{-- Kuliner 2: Sop Konro --}}
        <x-card-destinasi 
            judul="Sop Konro"
            deskripsi="Hidangan sup iga sapi dengan kuah berwarna gelap yang kaya rempah. Warna hitam didapat dari penggunaan kluwek, dan seringkali disajikan dengan burasa atau ketupat."
            gambar="konro.webp"
        />

        {{-- Kuliner 3: Es Pisang Ijo --}}
        <x-card-destinasi 
            judul="Es Pisang Ijo"
            deskripsi="Hidangan penutup manis berupa pisang yang dibalut adonan tepung berwarna hijau, disajikan dengan bubur sumsum putih, es serut, dan sirup merah. Segar dan ikonik."
            gambar="pisangijo.webp"
        />
        
    </div>
@endsection
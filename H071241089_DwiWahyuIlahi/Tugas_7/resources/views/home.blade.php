@extends('layouts.master')

@section('title', 'Home - Eksplor Makassar')

@section('content')
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="color: #007bff;">Selamat Datang di Kota Daeng!</h2>
        
        <p style="font-size: 1.1em; max-width: 800px; margin: 20px auto;">
            Makassar, yang juga dikenal sebagai Kota Daeng, adalah ibu kota Provinsi Sulawesi Selatan dan merupakan salah satu kota metropolitan terbesar di Indonesia Timur. Kota ini terkenal sebagai **pusat perdagangan dan pelabuhan** yang kaya akan sejarah dan budaya Maritim.
        </p>
    </div>

    <hr>

    <h3>Kenapa harus Eksplor Makassar?</h3>
    <div style="display: flex; justify-content: space-around; text-align: center; gap: 20px;">
        <div style="width: 30%;">
            <h4 style="color: #28a745;">Destinasi Ikonik</h4>
            <p>Dari ikon terkenal seperti **Pantai Losari** hingga situs sejarah kolonial seperti **Benteng Rotterdam**, Makassar menawarkan perpaduan wisata alam, sejarah, dan modern.</p>
        </div>
        <div style="width: 30%;">
            <h4 style="color: #ffc107;">Surganya Kuliner</h4>
            <p>Rasakan kelezatan legendaris seperti **Coto Makassar**, **Sop Konro**, dan hidangan manis menyegarkan seperti **Es Pisang Ijo** yang tak ada duanya.</p>
        </div>
        <div style="width: 30%;">
            <h4 style="color: #dc3545;">Jantung Indonesia Timur</h4>
            <p>Makassar adalah gerbang menuju keindahan alam Sulawesi Selatan dan Timur, menjadikannya titik awal yang sempurna untuk petualangan Anda di Nusantara.</p>
        </div>
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ url('/destinasi') }}" style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Mulai Petualangan Anda!</a>
    </div>
@endsection
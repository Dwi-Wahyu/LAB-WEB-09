@extends('layouts.master')

@section('title', 'Destinasi Wisata Makassar')

@section('content')
    <h2 style="text-align: center; color: #007bff;">Destinasi Wisata Unggulan Makassar</h2>
    <p style="text-align: center; margin-bottom: 30px;">Jelajahi keindahan alam dan situs bersejarah di Kota Daeng.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        
        {{-- Panggil Komponen CardDestinasi untuk setiap destinasi --}}
        
        <x-card-destinasi 
            judul="Pantai Losari"
            deskripsi="Ikon Kota Makassar yang terkenal dengan panorama matahari terbenamnya yang eksotis di Selat Makassar. Tempat yang sempurna untuk bersantai dan menikmati kuliner Pisang Epe'."
            gambar="losari.webp"
        />

        <x-card-destinasi 
            judul="Benteng Rotterdam"
            deskripsi="Situs sejarah peninggalan Belanda yang menyimpan banyak kisah perlawanan. Dulunya dikenal sebagai Benteng Ujung Pandang. Di sini juga terdapat Museum La Galigo."
            gambar="rotterdam.webp"
        />

        <x-card-destinasi 
            judul="Pulau Samalona"
            deskripsi="Pulau kecil dengan pasir putih dan air laut yang jernih, sangat cocok untuk snorkeling dan diving. Menawarkan pengalaman liburan tropis yang menawan dan tenang."
            gambar="samalona.webp"
        />

    </div>
@endsection
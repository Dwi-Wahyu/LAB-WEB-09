@extends('layouts.master')

@section('title', 'Galeri Foto Makassar')

@section('content')
    <h2 style="text-align: center; color: #007bff;">Galeri Eksotis Makassar</h2>
    <p style="text-align: center; margin-bottom: 30px;">Potret keindahan alam dan warisan budaya Kota Daeng.</p>

    <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
        }
        .caption {
            text-align: center;
            margin-top: 5px;
            font-size: 0.9em;
            color: #555;
        }
    </style>

    <div class="gallery-grid">
        <div class="gallery-item">
            <img src="{{ asset('images/paotere.webp') }}" alt="Kapal Pinisi di Paotere">
            <p class="caption">Pelabuhan Paotere dengan Kapal Pinisi</p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/99kubah.webp') }}" alt="Masjid 99 Kubah">
            <p class="caption">Masjid Kubah 99 Asmaul Husna</p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/sunset.webp') }}" alt="Sunset Makassar">
            <p class="caption">Siluet Senja di Pantai Akkarena</p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/bugiswaterpark.webp') }}" alt="Bugis Waterpark">
            <p class="caption">Wahana Air di Bugis Waterpark Adventure</p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/museum.webp') }}" alt="Museum La Galigo">
            <p class="caption">Museum La Galigo di Benteng Rotterdam</p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/flyover.webp') }}" alt="Jalan Tanjung Bunga">
            <p class="caption">Flyover Pettarani</p>
        </div>
    </div>
@endsection
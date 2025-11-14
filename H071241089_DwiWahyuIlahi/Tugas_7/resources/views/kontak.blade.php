@extends('layouts.master')

@section('title', 'Hubungi Kami')

@section('content')
    <h2 style="color: #007bff; text-align: center;">Informasi Kontak & Saran</h2>
    <p style="text-align: center;">Silahkan hubungi kami atau berikan saran melalui formulir di bawah ini.</p>

    <div style="display: flex; gap: 40px; margin-top: 30px;">
        
        {{-- Bagian Informasi Kontak --}}
        <div style="flex: 1;">
            <h3>Detail Kontak</h3>
            <p><strong>Alamat:</strong> Jl. Eksplorasi No. 17, Kota Makassar, Sulawesi Selatan</p>
            <p><strong>Email:</strong> info@makassartourism.com</p>
            <p><strong>Telepon:</strong> (0411) 1234567</p>
            <p>Kami siap membantu Anda menjelajahi keindahan Makassar!</p>
        </div>

        {{-- Bagian Formulir Sederhana (HTML Saja) --}}
        <div style="flex: 2; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Formulir Saran/Pertanyaan</h3>
            <form action="#" method="POST">
                <div style="margin-bottom: 15px;">
                    <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama:</label>
                    <input type="text" id="nama" name="nama" required 
                           style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
                    <input type="email" id="email" name="email" required 
                           style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="pesan" style="display: block; margin-bottom: 5px; font-weight: bold;">Pesan:</label>
                    <textarea id="pesan" name="pesan" rows="4" required 
                              style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                </div>

                <button type="submit" 
                        style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
@endsection
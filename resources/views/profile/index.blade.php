@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-6 px-4">

<div class="grid md:grid-cols-4 gap-4">

    <!-- SIDEBAR -->
    <div class="border-2 border-black p-3 bg-yellow-300 h-fit">
        <ul class="space-y-2 text-sm font-bold">

            <li>
                <a href="{{ route('profile.edit') }}"
                   class="block border-2 border-black px-3 py-2 
                   {{ request('tab','data-diri') == 'data-diri' ? 'bg-black text-white' : 'bg-white' }}">
                    <i class="fa fa-user mr-2"></i> Data Diri
                </a>
            </li>

            <li>
                <a href="?tab=pendidikan"
                   class="block border-2 border-black px-3 py-2 bg-white">
                    <i class="fa fa-school mr-2"></i> Pendidikan
                </a>
            </li>

            <li>
                <a href="?tab=pengalaman"
                   class="block border-2 border-black px-3 py-2 bg-white">
                    <i class="fa fa-briefcase mr-2"></i> Pengalaman
                </a>
            </li>

        </ul>
    </div>

    <!-- CONTENT -->
    <div class="md:col-span-3 border-2 border-black p-4 bg-white">

        @php $tab = request('tab', 'data-diri'); @endphp

        @if($tab == 'data-diri')

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-4 border-b-2 border-black pb-2">
                <h2 class="font-bold text-lg">Data Diri</h2>

                <a href="{{ route('profile.edit', ['section' => 'data-diri']) }}"
                   class="border-2 border-black px-3 py-1 text-sm bg-blue-300 hover:bg-black hover:text-white">
                    <i class="fa fa-pen"></i> Edit
                </a>
            </div>

            <!-- CONTENT DATA -->
            <div class="grid md:grid-cols-2 gap-4 text-sm">

                <!-- FOTO -->
                <div>
                    <img src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://via.placeholder.com/150' }}"
                         class="w-32 h-32 object-cover border-2 border-black">
                </div>

                <!-- DATA -->
                <div class="space-y-2">
                    <p><b>NIK:</b> {{ $user->nik }}</p>
                    <p><b>Nama:</b> {{ $user->name }}</p>
                    <p><b>Email:</b> {{ $user->email }}</p>
                    <p><b>No HP:</b> {{ $user->phone }}</p>
                    <p><b>Jenis Kelamin:</b> {{ $user->gender }}</p>
                    <p><b>Tempat Lahir:</b> {{ $user->birth_place }}</p>
                    <p><b>Tanggal Lahir:</b> {{ $user->birth_date }}</p>
                    <p><b>Alamat:</b> {{ $user->address }}</p>
                </div>

            </div>

        @endif

    </div>
</div>
</div>
@endsection
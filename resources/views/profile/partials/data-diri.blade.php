<div class="flex justify-between items-center mb-4">
    <h2 class="font-bold text-lg">Data Diri</h2>

    <a href="{{ route('profile.edit', ['section' => 'data-diri']) }}"
       class="border-2 border-black px-3 py-1 bg-blue-300 hover:bg-black hover:text-white text-sm">
       <i class="fa fa-pen"></i> Edit
    </a>
</div>

<div class="grid md:grid-cols-2 gap-4 text-sm">

    <div>
        <img src="{{ asset('storage/'.$user->photo) }}"
             class="w-32 h-32 object-cover border-2 border-black">
    </div>

    <div class="space-y-2">
        <p><b>NIK:</b> {{ $user->nik }}</p>
        <p><b>Nama:</b> {{ $user->name }}</p>
        <p><b>Email:</b> {{ $user->email }}</p>
        <p><b>Phone:</b> {{ $user->phone }}</p>
        <p><b>Jenis Kelamin:</b> {{ $user->gender }}</p>
        <p><b>Tempat Lahir:</b> {{ $user->birth_place }}</p>
        <p><b>Tanggal Lahir:</b> {{ $user->birth_date }}</p>
        <p><b>Alamat:</b> {{ $user->address }}</p>
    </div>

</div>
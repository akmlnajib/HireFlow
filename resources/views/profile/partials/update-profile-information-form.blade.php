<section class="max-w-4xl mx-auto px-6">

    <h2 class="text-lg font-bold mb-4 border-b-2 border-black pb-2">
        <i class="fa-solid fa-user"></i> Data Diri
    </h2>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- ROW UTAMA --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            {{-- FOTO (KIRI) --}}
            <div class="lg:col-span-1">
                <div class="border-2 border-black p-3">
                    <img 
                        src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}"
                        class="w-full h-40 object-cover border-2 border-black">

                    <input type="file" name="photo" class="mt-3 text-sm w-full">
                    <p class="text-xs mt-1">Max 1MB</p>
                </div>
            </div>

            {{-- FORM (KANAN MEMANJANG) --}}
            <div class="lg:col-span-3">

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

                    <div>
                        <label class="text-sm font-medium">NIK</label>
                        <input type="text" name="nik"
                            value="{{ old('nik', $user->nik ?? '') }}"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Nama</label>
                        <input type="text" name="name"
                            value="{{ old('name', $user->name) }}"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Email</label>
                        <input type="email" name="email"
                            value="{{ old('email', $user->email) }}"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">No HP</label>
                        <input type="text" name="phone"
                            value="{{ old('phone', $user->phone ?? '') }}"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Jenis Kelamin</label>
                        <select name="gender"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                            <option value="">- pilih -</option>
                            <option value="L" {{ old('gender', $user->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender', $user->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Tempat Lahir</label>
                        <input type="text" name="birth_place"
                            value="{{ old('birth_place', $user->birth_place ?? '') }}"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Tanggal Lahir</label>
                        <input type="date" name="birth_date"
                            value="{{ old('birth_date', $user->birth_date ?? '') }}"
                            class="w-full border-2 border-black px-2 py-1 text-sm">
                    </div>

                </div>

                {{-- ALAMAT FULL WIDTH --}}
                <div class="mt-4">
                    <label class="text-sm font-medium">Alamat</label>
                    <textarea name="address" rows="3"
                        class="w-full border-2 border-black px-2 py-1 text-sm">{{ old('address', $user->address ?? '') }}</textarea>
                </div>

                {{-- BUTTON --}}
                <div class="mt-5 text-right">
                    <button class="border-2 border-black px-4 py-2 bg-yellow-300 font-bold text-sm hover:translate-x-[2px] hover:translate-y-[2px] transition">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan
                    </button>
                </div>

            </div>

        </div>

    </form>
</section>
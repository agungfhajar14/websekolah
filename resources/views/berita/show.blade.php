@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')

{{-- ========================================================= --}}
{{-- HEADER --}}
{{-- ========================================================= --}}

<section class="bg-green-900">

    <div class="mx-auto max-w-5xl px-4 py-16
                sm:px-6 lg:px-8">

        <div class="text-center">

            <span class="inline-flex rounded-full
                         bg-green-700 px-4 py-2
                         text-xs font-semibold
                         text-green-100">

                Pendidikan

            </span>

            <h1 class="mt-6 text-3xl font-bold
                       leading-tight text-white
                       sm:text-4xl lg:text-5xl">

                Kegiatan dan Informasi Terbaru
                Sekolah

            </h1>

            <div class="mt-6 flex items-center
                        justify-center gap-4
                        text-sm text-green-200">

                <span>
                    17 Agustus 2026
                </span>

                <span class="h-1 w-1 rounded-full bg-green-400"></span>

                <span>
                    Admin
                </span>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- ARTICLE --}}
{{-- ========================================================= --}}

<section class="bg-gray-50">

    <div class="mx-auto max-w-4xl px-4 py-16
                sm:px-6 lg:px-8">

        {{-- Featured Image --}}
        <div class="overflow-hidden rounded-2xl
                    border border-gray-200
                    bg-white shadow-green">

            <img
                src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1600&q=80"
                alt="Kegiatan sekolah"
                class="h-auto w-full object-cover">

        </div>


        {{-- Article --}}
        <article class="mt-10 rounded-2xl
                        border border-gray-200
                        bg-white p-6 shadow-sm
                        sm:p-10">

            <div class="prose prose-green max-w-none">

                <p class="text-lg leading-8 text-gray-600">

                    Sekolah terus berkomitmen untuk memberikan
                    pendidikan terbaik bagi seluruh peserta didik.
                    Berbagai kegiatan dilaksanakan sebagai bagian
                    dari proses pembelajaran dan pengembangan
                    karakter siswa.

                </p>


                <h2 class="mt-10 text-2xl font-bold text-gray-900">

                    Meningkatkan Kualitas Pendidikan

                </h2>


                <p class="mt-4 leading-8 text-gray-600">

                    Melalui berbagai program dan kegiatan,
                    sekolah berupaya menciptakan lingkungan
                    belajar yang nyaman, aman, dan menyenangkan.

                    Peserta didik diberikan kesempatan untuk
                    mengembangkan potensi mereka baik dalam
                    bidang akademik maupun non-akademik.

                </p>


                <h2 class="mt-10 text-2xl font-bold text-gray-900">

                    Mendorong Kreativitas Siswa

                </h2>


                <p class="mt-4 leading-8 text-gray-600">

                    Kreativitas menjadi salah satu aspek penting
                    dalam pendidikan. Oleh karena itu berbagai
                    kegiatan inovatif terus dikembangkan untuk
                    mendorong siswa menjadi lebih aktif dan
                    produktif.

                </p>


                <div class="my-10 rounded-xl border-l-4
                            border-green-600 bg-green-50
                            p-6">

                    <p class="font-medium leading-7 text-green-800">

                        "Pendidikan bukan hanya tentang
                        pengetahuan, tetapi juga tentang
                        membangun karakter dan mempersiapkan
                        generasi masa depan."

                    </p>

                </div>


                <p class="leading-8 text-gray-600">

                    Dengan dukungan seluruh warga sekolah,
                    diharapkan setiap program dapat memberikan
                    manfaat nyata dan menciptakan lingkungan
                    pendidikan yang terus berkembang.

                </p>

            </div>

        </article>


        {{-- Back --}}
        <div class="mt-8">

            <a href="{{ url('/berita') }}"
               class="inline-flex items-center gap-2
                      rounded-xl border border-gray-200
                      bg-white px-5 py-3 text-sm
                      font-semibold text-gray-600
                      shadow-sm transition
                      hover:border-green-200
                      hover:text-green-600">

                ← Kembali ke Berita

            </a>

        </div>

    </div>

</section>

@endsection

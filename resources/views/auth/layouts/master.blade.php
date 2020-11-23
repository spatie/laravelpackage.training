@extends('front.layouts.master', ['hideFooter' => true])

@section('content')
    <main class="flex-1 flex flex-col justify-center z-10 py-16">
        <div class="absolute inset-0 bg-blue-700 opacity-75"> </div>

        <section class="layout-col ">
            <div class="mx-auto w-full max-w-xl z-10 shadow-2xl border-l-4 border-orange-500 overflow-hidden">
                <div class="block bg-white">
                    <div class="markup markup-links p-12">
                        @yield('auth')
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

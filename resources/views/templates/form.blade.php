@extends('templates.master')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">@yield('title')</h1>
                                    </div>
                                    <form class="user text-center" method="post" action="/@yield('action')_action">
                                        @csrf
                                        @yield('form')
                                    </form>
                                    @yield('linker')
                                    <div class="text-center">
                                        <a href="{{ url()->previous() }}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('errors')
            </div>
        </div>
    </div>
@endsection

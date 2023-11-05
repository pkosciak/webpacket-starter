@extends('core.layout')

@section('content')
    <!-- {{ $controller }} -->
    <main class="tw-grid tw-min-h-full tw-place-items-center tw-bg-white tw-px-6 tw-py-24 sm:tw-py-32 lg:tw-px-8">
        <div class="tw-text-center">
            <p class="tw-text-base tw-font-semibold tw-text-neutral-600">{{ $code }}</p>
            <h1 class="tw-mt-4 tw-text-3xl tw-font-bold tw-tracking-tight tw-text-gray-900 sm:tw-text-5xl">{{ $heading }}</h1>
            <p class="tw-mt-6 tw-text-base tw-leading-7 tw-text-gray-600">{{ $subheading }}</p>
            <div class="tw-mt-10 tw-flex tw-items-center tw-justify-center tw-gap-x-6">
                <a href="@php echo get_site_url() @endphp" class="tw-rounded-md tw-bg-neutral-800 tw-px-3.5 tw-py-2.5 tw-text-sm tw-font-semibold tw-text-white tw-shadow-sm hover:tw-bg-neutral-950 focus-visible:tw-outline focus-visible:tw-outline-2 focus-visible:tw-outline-offset-2 focus-visible:tw-outline-neutral-600">{{ $goback }}</a>
                <a href="@php echo get_site_url() . '/contact/' @endphp" class="tw-text-sm tw-font-semibold tw-text-gray-900">{{ $contact }} <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>
@endsection
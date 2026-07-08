@php
    $settings = $gSettings ?? null;
    $logo = $settings?->logo;
    $logoUrl = $logo
        ? (str_starts_with($logo, 'http') ? $logo : asset('storage/' . $logo))
        : null;
    $websiteName = $settings?->website_name ?? config('app.name', 'Kartar RW');
@endphp

@if($logoUrl)
    <img src="{{ $logoUrl }}" alt="{{ $websiteName }}" {{ $attributes->merge(['class' => 'object-contain']) }}>
@else
    <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-label="{{ $websiteName }}" {{ $attributes }}>
        <path fill="currentColor" d="M32 6 8 18v18c0 11.25 9.94 18.31 24 22 14.06-3.69 24-10.75 24-22V18L32 6Zm0 7.19 17 8.5V36c0 6.97-5.68 12.2-17 15.75C20.68 48.2 15 42.97 15 36V21.69l17-8.5Z"/>
        <path fill="currentColor" d="M23 28a5 5 0 1 1 10 0 5 5 0 0 1-10 0Zm11.5 0a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18 42c1.42-5.13 5.12-8 10-8 4.89 0 8.58 2.87 10 8H18Zm17.93-7.45A9.6 9.6 0 0 1 39 40.2h7c-1.1-3.78-3.84-5.95-7.5-5.95-.9 0-1.76.1-2.57.3Z"/>
    </svg>
@endif

@props(['for'])

@error($for)
<p {{ $attributes->merge(['class' => 'text-base py-1 text-red-500 ']) }}>{{ $message }}</p>
@enderror

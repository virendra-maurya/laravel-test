@props([
'size' => 'small', // small, medium, large, full
'cancelText' => __('Cancel'),
])

@php
    $size = [
        'extraSmall'     => 'max-w-md w-full',
        'small'     => 'max-w-xl w-full',
        'medium'    => 'max-w-screen-md w-full',
        'large'     => 'max-w-full w-full',
        'auto'      => 'w-auto'
    ][$size];
@endphp

<div x-data="{open: @entangle($attributes->wire('model'))}" class="flex items-center justify-center text-center">
    <!-- Modal -->
    <div
        x-show="open"
        x-ref="modalWrapper"
        style="display: none"
        x-on:keydown.escape.window="open = false"
        role="dialog"
        aria-modal="true"
        x-id="['modal-title']"
        :aria-labelledby="$id('modal-title')"
        class="fixed inset-0 z-[99999] overflow-y-auto"
    >
        <!-- Overlay -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 transition-opacity bg-black bg-opacity-70"
             aria-hidden="true"></div>
        <!-- Panel -->
        <div
            x-show="open" x-transition.duration.50ms
            x-on:click="open = false"
            class="flex items-center justify-center min-h-screen p-3 py-3 text-center sm:p-8 popup">
            <div
                class="bg-white relative inline-block overflow-hidden text-left align-bottom transition-all transform rounded-xl sm:align-middle {{$size}}">
                <div
                    x-on:click.stop
                    x-trap.noscroll.inert="open"
                    @click.outside="open = false"
                    class="bg-white relative w-full overflow-y-auto shadow rounded-xl 1234"
                >
                    @if(isset($title))
                        <div class="flex justify-end p-4 border-b border-gray-300">
                            <div class="flex items-center flex-grow space-x-2">
                                <h3 class="text-xl font-semibold" :id="$id('modal-title')">
                                    {{ $title }}
                                </h3>
                            </div>
                            <button type="button"
                                    class="flex items-center justify-center flex-shrink-0 text-gray-700 focus:outline-none focus:ring-0"
                                    @click="open = false">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    @endif

                    @if(isset($headerText) && $headerText)
                        <div class="flex justify-end p-2">
                            <button type="button"
                                    class="flex items-center justify-center flex-shrink-0 text-gray-700 focus:outline-none focus:ring-0 w-7 h-7"
                                    @click="open = false">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    @endif


                    <!-- Content -->
                    <div class="modal-content">
                        {{ $body }}
                    </div>

                    <!-- Buttons -->

                    @if(isset($buttons))
                        <div class="flex justify-end p-3">
                            {{ $buttons }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

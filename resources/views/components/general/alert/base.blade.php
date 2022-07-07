<div 
x-data="{ show: true }" 
x-show="show"
x-transition:leave-end="transform translate-x-full opacity-0" 
x-transition:leave-start="transform translate-x-0 opacity-100"
x-transition:leave="transition ease-out duration-500"
x-transition:enter-end="transform opacity-100 translate-y-0 sm:translate-x-0"
x-transition:enter-start="transform opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
x-transition:enter="transition ease-in duration-200"
x-description="Notification panel, show/hide based on alert state."
x-init="setTimeout(() => show = false, 2000)"
>
      <div {{ $attributes->merge(['class' => '']) }} role="alert">
            <p class="font-bold"></p>
            <p>{{ $message }}</p>
      </div>
</div>
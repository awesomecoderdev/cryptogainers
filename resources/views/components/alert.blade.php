 {{-- start:error handeller --}}
 @if (Session::has('success'))
     <x-notice>
         <x-slot name="title">Success!</x-slot>
         <x-slot name="type">success</x-slot>
         <x-slot name="message">{{ session('success') }}</x-slot>
     </x-notice>
 @endif
 @if (Session::has('error'))
     <x-notice>
         <x-slot name="title">Error!</x-slot>
         <x-slot name="type">error</x-slot>
         <x-slot name="message">{{ session('error') }}</x-slot>
     </x-notice>
 @endif
 @if (Session::has('warning'))
     <x-notice>
         <x-slot name="title">Warning!</x-slot>
         <x-slot name="type">warning</x-slot>
         <x-slot name="message">{{ session('warning') }}</x-slot>
     </x-notice>
 @endif
 @if (Session::has('info'))
     <x-notice>
         <x-slot name="title">Info!</x-slot>
         <x-slot name="type">info</x-slot>
         <x-slot name="message">{{ session('info') }}</x-slot>
     </x-notice>
 @endif
 {{-- end:error handeller --}}

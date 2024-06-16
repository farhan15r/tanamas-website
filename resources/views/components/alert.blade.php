@if (session('alertMessage'))
  @php
    $alertClasses = [
      'info' => 'text-blue-400',
      'success' => 'text-green-400',
      'warning' => 'text-yellow-400',
      'danger' => 'text-red-400',
      'error' => 'text-red-400',
    ];

    $alertClass = $alertClasses[session('alertType') ?? 'info'];
  @endphp

  <div class="z-[999] sticky h-0 top-16 flex justify-center w-full items-center">
    <div id="alert-sticky" class="w-fit flex items-center p-4 mb-4 rounded-lg bg-gray-800 {{ $alertClass }}"
      role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
        {{ session('alertMessage') }}
      </div>
      <button type="button"
        class="ms-auto -mx-1.5 -my-1.5  rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 inline-flex items-center justify-center h-8 w-8 bg-gray-800 {{ $alertClass }} hover:bg-gray-700"
        data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
  </div>


  <script>
    const alertSticky = document.getElementById('alert-sticky');
    const alertDismiss = alertSticky.querySelector('[data-dismiss-target]');
    alertDismiss.addEventListener('click', () => {
      alertSticky.classList.add('fade-out');
      setTimeout(() => {
        alertSticky.remove();
      }, 500); // Adjust the duration of the fade-out animation here (in milliseconds)
    });

    setTimeout(() => {
      alertSticky.classList.add('fade-out');
      setTimeout(() => {
        alertSticky.remove();
      }, 500); // Adjust the duration of the fade-out animation here (in milliseconds)
    }, 10000);
  </script>

  <style>
    .fade-out {
      opacity: 0;
      transition: opacity 0.5s ease-out;
    }
  </style>
@endif

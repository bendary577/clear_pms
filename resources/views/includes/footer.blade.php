
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        @if(!Auth::user())
        <p class="d-flex justify-content-center align-items-center">
          <div class="me-3 my-2">{{__('lang.footer.register')}}</div>
          <button type="button" class="btn btn-outline-light btn-rounded">
            {{ __('lang.footer.signup')}}
          </button>
        </p>
        @else
        <p class="d-flex justify-content-center align-items-center">
          <div class="me-3 my-2">{{__('lang.footer.welcome')}}</div>
        </p>
        @endif
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      {{ __('lang.footer.copyrights')}}
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
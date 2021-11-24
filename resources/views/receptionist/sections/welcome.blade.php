<div class="container">
        <div>
            <!--- if any errors when deleting a receptionist profile ----------->
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!--- if receptionist profile is deleted successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            </div>

            <div class="container">
                <!------------------- badges --------------------------->
                @include('receptionist.sections.welcome_dashboard.upper_badges')
                <!------------------- statistics --------------------------->
                @include('receptionist.sections.welcome_dashboard.main_statistics')
                <!---------------------- counts ------------------------------->
                @include('receptionist.sections.welcome_dashboard.counts_section')
                <!------------------- charts --------------------------->
                @include('receptionist.sections.welcome_dashboard.charts')
            </div>
</div>




<div class="container">

    <div class="go_back mb-4">
        <a href="{{ url()->previous() }}" style="text-decoration:inherit">
            <h4 class="text-primary">< Return back</h4>
        </a>
    </div>

    <div class="row">
        @if($perscreption)
            @if(count($perscreption->medicines)>0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">medicine name</th>
                            <th scope="col">medicine dose</th>
                            <th scope="col">medicine duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perscreption->medicines as $medicine)
                            <tr>
                                <th>{{ $medicine->name }}</th>
                                <th>{{ $medicine->dose }}</th>
                                <th>{{ $medicine->duration }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-danger">this perscreption has no medicines</h4>
            @endif

        @else
            <h4 class="text-danger mt-4">this perscreption has no medicines yet</h4>
        @endif
        </div>
</div>
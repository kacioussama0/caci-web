<div>

    @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
    @endif

        @if(Session::has('failed'))
            <p class="alert alert-danger">{{ Session::get('failed') }}</p>
        @endif

    @if(count($object))
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    {{$thead}}
                </thead>

                <tbody>
                    {{$tbody}}
                </tbody>
            </table>
        </div>

        @else

            <div class="alert alert-danger">
                <h3 class="display-3 text-center">Vide</h3>
            </div>


        @endif





</div>

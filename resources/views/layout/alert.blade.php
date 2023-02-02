@if(session('success'))

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="alert alert-success text-center" role="alert">
                    {{session('success')}}
                </div>
            </div>
        </div>
    </div>


@endif

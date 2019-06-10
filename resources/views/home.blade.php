{{-- Return nav bar for admin or reseller --}}


@extends(auth()->user()->is_admin ? 'layouts.appAdmin' : 'layouts.appReseller')

@section('content')
        @if(auth()->user()->is_admin == 1)
            <h1>admin</h1>    
            
        @else
            <h1>reseller</h1>    
        
        @endif                
            {{-- <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

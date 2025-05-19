@extends('layouts.app')

@section('title', 'verify your email')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="form-container-all">
        <div class="form-container">
            <form action="{{route("verify.account")}}" method="post">
                @csrf
                <h3>get the code</h3>
                <input
                    type="number"
                    name="verification_code"

                    placeholder="check your email"

                    class="box"
                    fdprocessedid="piotnh"
                />
                <input
                    type="hidden"
                    name="email"
                    required=""
                    placeholder="check your email"
                    value="{{$email}}"


                    class="box"
                    fdprocessedid="piotnh"
                />
                <input
                    type="submit"
                    value="verify"
                    class="btn"
                    name="submit"
                    fdprocessedid="367ae"
                />

            </form>
        </div>
    </div>
    </section>
@endsection

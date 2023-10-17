@extends('base')

@section('content')
<div style="display: grid; place-content: center">

    <div class="m-5 p-3 rounded-lg mx-auto" style="display: flex; justify-content: space-between; width: 1500px;">
        <header class="text-dark d-flex">

        <h5> <p class="mr-3 mt-3">Welcome <b>{{ Auth::user()->name }}!</b> to my Milktea shop</p></h5>
        </header> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <a style="font-size: 20px;" href="/milkteas" class="btn me-2 mb-3 text-dark mt-3"><i class="fa-solid fa-mug-saucer"></i> Milktea</a>
        <a style="font-size: 20px;" href="/logs" class="btn mb-3 text-dark mt-3"><i class="fa-solid fa-paper-plane"></i> Logs</a>
        <button class="text-white rounded-lg pe-4 ps-4 text-danger btn" style=" background-color: transparent;" id="logoutButton" data-toggle="modal" data-target="#confirmLogoutModal">Logout</button>
        <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirm Logout</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Confirm Logout</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>

    <div class="" style="width: 1500px; margin-top: -40px;">

        <div class="">

            <div class="card-body">
                <h5>
                <div>
                    @foreach ($logEntries as $logEntry)
                        <div class="p-3 m-2 shadow-sm mb-5 bg-white rounded-lg" style="width: 1440px;">
                            <div class="mb-3">
                                {{$logEntry->log_entry}}
                            </div>
                        </div>
                    @endforeach
                </div>

                </h5>
            </div>
        </div>
    </div>
</div>


@endsection
@auth

@endauth


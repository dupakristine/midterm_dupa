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
        <div style="">
            <div class="mt-3 float-end">
                <button type="button" class="btn text-white bg-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Add Milktea
                </button>
            </div>
        </div>
<br> <br> <br> <br>

        <div>
            <div class="d-flex flex-wrap">
                @foreach ($milkteas as $milktea)
                <div class="m-4 p-2 rounded-lg shadow-sm" style="background-color: rgb(239, 239, 239);">
                    <img width="300" height="300" src="https://png.pngtree.com/png-vector/20230414/ourmid/pngtree-pearl-milk-tea-splashing-3d-real-creative-photography-png-image_6686124.png" alt="">
                    <div>
                        <b>Name: </b>{{$milktea->name}} <br>
                        <hr>
                        <b>Flavor: </b>{{$milktea->flavor}} <br>
                        <hr>
                        <b>Price: </b>{{$milktea->price}} <br>
                        <hr>
                        <b>Size: </b>{{$milktea->size}} <br>
                        <hr>
                        <b>Addons: </b>{{$milktea->addons}} <br>
                        <hr>
                    </div>
                    <div>
                        <button class="btn text-success" data-toggle="modal" data-target="#editModal-{{ $milktea->id }}"><i class="fa fa-edit"></i> <b></b></button>
                        <button class="btn text-danger" data-toggle="modal" data-target="#deleteModal-{{ $milktea->id }}" data-milktea-id="{{ $milktea->id }}"><i class="fa fa-trash"></i> <b></b></button>

                    </div>
                </div>
                    <!-- Delete Modal -->
                    <div id="deleteModal-{{ $milktea->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this milktea?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form id="deleteForm-{{ $milktea->id }}" method="POST" action="{{ route('milkteas.destroy', $milktea) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Edit Modal -->
                    <div id="editModal-{{ $milktea->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Milktea</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm-{{ $milktea->id }}" method="POST" action="{{ route('milkteas.update', $milktea) }}">
                                        @csrf
                                        @method('PATCH')

                                        <!-- Add form fields for editing the milktea's data here -->
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $milktea->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="flavor">Flavor:</label>
                                            <select name="flavor" id="flavor" class="form-control" required>
                                                <option value="Classic Black Milk Tea" {{ $milktea->flavor === 'Classic Black Milk Tea' ? 'selected' : '' }}>Classic Black Milk Tea</option>
                                                <option value="Taro Milk Tea" {{ $milktea->flavor === 'Taro Milk Tea' ? 'selected' : '' }}>Taro Milk Tea</option>
                                                <option value="Thai Milk Tea" {{ $milktea->flavor === 'Thai Milk Tea' ? 'selected' : '' }}>Thai Milk Tea</option>
                                                <option value="Matcha Green Tea Milk Tea" {{ $milktea->flavor === 'Matcha Green Tea Milk Tea' ? 'selected' : '' }}>Matcha Green Tea Milk Tea</option>
                                                <option value="Honeydew Milk Tea" {{ $milktea->flavor === 'Honeydew Milk Tea' ? 'selected' : '' }}>Honeydew Milk Tea</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="text" class="form-control" id="price" name="price" value="{{ $milktea->price }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="size">Size:</label>
                                            <select name="size" id="size" class="form-control" required>
                                                <option value="Small" {{ $milktea->size === 'Small' ? 'selected' : '' }}>Small</option>
                                                <option value="Medium" {{ $milktea->size === 'Medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="Large" {{ $milktea->size === 'Large' ? 'selected' : '' }}>Large</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="addons">Addons:</label>
                                            <select name="addons" id="addons" class="form-control" required>
                                                <option value="Extra Pearls" {{ $milktea->addons === 'Extra Pearls' ? 'selected' : '' }}>Extra Pearls</option>
                                                <option value="Pudding" {{ $milktea->addons === 'Pudding' ? 'selected' : '' }}>Pudding</option>
                                                <option value="Crushed Oreo" {{ $milktea->addons === 'Crushed Oreo' ? 'selected' : '' }}>Crushed Oreo</option>

                                            </select>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" form="editForm-{{ $milktea->id }}" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>



        </div>


       <!-- Modal -->
       <div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Create Milktea</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form method="POST" action="{{ route('milkteas.store') }}">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="flavor">Flavor:</label>
                            <select name="flavor" id="flavor" class="form-control" required>
                                <option value="Classic Black Milk Tea">Classic Black Milk Tea</option>
                                <option value="Taro Milk Tea">Taro Milk Tea</option>
                                <option value="Thai Milk Tea">Thai Milk Tea</option>
                                <option value="Matcha Green Tea Milk Tea">Matcha Green Tea Milk Tea</option>
                                <option value="Honeydew Milk Tea">Honeydew Milk Tea</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <select name="size" id="size" class="form-control" required>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addons">Addons:</label>
                            <select name="addons" id="addons" class="form-control" required>
                                <option value="Extra Pearls">Extra Pearls</option>
                                <option value="Pudding">Pudding</option>
                                <option value="Crushed Oreo">Crushed Oreo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>

                </div>
            </div>
            </div>
        </form>
    </div>

    </div>
</div>
<style>
    .software-checkboxes {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }
    .form-check {
        display: flex;
        align-items: center;
    }
</style>
<script>
   function updateSelectedSoftware() {
        const checkboxes = document.querySelectorAll('input[name="software"]');
        const selectedSoftware = [];

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedSoftware.push(checkbox.value);
            }
        });

        const selectedSoftwareInput = document.getElementById('daws');
        selectedSoftwareInput.value = selectedSoftware.join(', '); // or use any other delimiter you prefer
    }
</script>

@endsection
@auth

@endauth


@extends('layouts.app')

<!-- Show -->
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 mx-auto">
                <!-- Card -->
                <div class="card">
                    @isset($dish->img)
                        <img class="card-img-top" src="{{ asset('/storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <span class="card-text">{{ $dish->price }}</span>
                       <!--Delete button-->
                        <form action="{{ route('admin.dishes.delete', $dish) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                        <!--Button that triggers modal-->
                            <button type="button" class="btn btn-danger modalTrigger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-dish-id="{{ $dish->id }}" data-dish-name="{{ $dish->name }}">Delete</button>
                        </form>
                    </td>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Delete modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>

            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this dish? This operation is not reversible.
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keep this dish</button>
            <!--Delete form-->
              <form id="deleteForm" method="POST" action="" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection

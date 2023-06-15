@extends('layouts.app')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Purchases</h2>

            </div>

            <div class="pull-right">

                @can('purchase-create')

                <a class="btn btn-success" href="{{ route('purchases.create') }}"> Create New Purchase</a>

                @endcan

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Details</th>

            <th width="280px">Action</th>

        </tr>

	    @foreach ($purchase as $purchase)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $purchase->name }}</td>

	        <td>{{ $purchase->detail }}</td>

	        <td>

                <form action="{{ route('purchases.destroy',$purchase->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('purchases.show',$purchase->id) }}">Show</a>

                    @can('purchase-edit')

                    <a class="btn btn-primary" href="{{ route('purchases.edit',$purchase->id) }}">Edit</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('purchase-delete')

                    <button type="submit" class="btn btn-danger">Delete</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach

    </table>


    {!! $purchases->links() !!}


@endsection
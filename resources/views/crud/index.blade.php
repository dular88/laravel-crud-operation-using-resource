<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=Larac, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-4 offset-sm-4">
            @if(Session::get('success'))
                <span class="alert alert-success">{{ Session::get('success') }}</span>
            @endif

            @if(Session::get('fail'))
                <span class="alert alert-danger">{{ Session::get('success') }}</span>
            @endif
            <form action="{{ route('CustomerResources.store') }}" method="post">
            @csrf
                <div class="card">
                        <div class="card-header">
                            Customer Add
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Enter Customer Email" />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Mobile</label>
                                <input type="number" value="{{ old('mobile') }}" class="form-control" name="mobile" placeholder="Enter Customer Mobile" />
                                <span class="text-danger">@error('mobile') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="card-footer">
                        <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <h1>Customer List</h1>
            <table class="table table-hovered table-stripped">
                    <thead>
                    <tr>
                        <th>SNo.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->mobile }}</td>
                            <td>
                           
                            <a type="button" href="{{ route('CustomerResources.edit',$data) }}" class="btn btn-primary">Edit</a>
                            &nbsp;
                            <form method="post" action="{{ route('CustomerResources.destroy',$data) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Sure to Delete !!!')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            </div>
    </div>
</body>
</html>
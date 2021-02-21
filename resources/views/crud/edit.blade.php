<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=Larac, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-4 offset-sm-4">
         
            @if(Session::get('fail'))
                <span class="alert alert-danger">{{ Session::get('fail') }}</span>
            @endif

            <form action="{{ route('CustomerResources.update',$customer) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $customer->id }}">
                <div class="card">
                        <div class="card-header">
                            Customer Edit
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $customer->name }}" class="form-control" name="name" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ $customer->email }}" class="form-control" name="email" placeholder="Enter Customer Email" />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Mobile</label>
                                <input type="number" value="{{ $customer->mobile }}" class="form-control" name="mobile" placeholder="Enter Customer Mobile" />
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

    </div>
</body>
</html>
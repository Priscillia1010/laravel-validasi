<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Laravel 9 Form Validation Example - ItSolutionStuff.com</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops</strong> There were some problem with your input
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{url('user/create')}}">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label" for="inputName">Name : </label>
                <input type="text" name="name" id="inputName"
                    class="form-controller @error('name') is-invalid @enderror" placeholder="Name">

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password :</label>
                <input type="password" name="password" id="inputPassword"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">

                @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email :</label>
                <input type="text" name="email" id="inputEmail"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Email">

                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>

        </template>
        <script>
        export default {

        }
        </script>
        <style lang="">

        </style>
        </h1>
    </div>
</body>

</html>
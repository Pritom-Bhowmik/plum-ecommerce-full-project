
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Login</title>
        <!-- Base Css Files -->
        <link href="{{asset('/backend/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('/backend/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/backend/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/backend/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('/backend/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/css/style.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('backend/js/jquery.min.js')}}"></script>
        <style>
        .field-error{
            padding: 8px 0px 0px;
            display: block;
        }
        </style>
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Dashboard</strong> </h3>
                </div> 



                <div class="panel-body">
                {{-- Success Or Error message show --}}
                @include('backend.layouts.message')

                <form class="form-horizontal m-t-20" action="{{route('backend.login.submit')}}" method="post">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg " type="text" required="" placeholder="E-mail" name="email" value="{{old('email')}}">
                            @error('email')
                                <span class="text-danger field-error">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="" placeholder="Password" name="password">
                            @error('password')
                                <span class="field-error text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" name="remember" checked>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            {{-- <a href="register.html">Create an account</a> --}}
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>
	    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
	</body>
</html>
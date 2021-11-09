<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh; */
                margin: 0;
            }

            /* .full-height {
                height: 100vh;
            } */

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    </head>
    <body>


        <div class="container mt-4 mb-4">
            <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p> --}}
                <div class="form">
                    <form id="metaForm" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="url" name="url_link" id="" class="form-control form-control-lg" placeholder="Enter URL" value="https://fueler.io">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" type="submit">Get MetaData</button>
                        </div>
                    </form>
                </div>
            </div>



            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <div class="form-group mb-0">

                        <div class="row">
                            <div class="col-md-6">
                                <img src="" id="image"  class="mw-100 m-2" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="title" id="title" class="form-control form-control-lg">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="title" id="description" class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>
                        
                        
                        {{-- <input type="file=" name="image" id="image" class=" mb-5 form-control form-control-lg"> --}}
                       
                    </div>
                </div>
            </div>
        </div>



        <div class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content">


                <br><br>
         


                <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class=" mb-5">
                                    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

       

        </div>

        <div class="modal fade bd-example-modal-lg" id="metaFormModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="" id="metaFormModalForm">

                            

                        </form>
                    </div>
                </div>
            </div>
        </div>


        
        <script type="text/javascript">
        
            $(document).ready(function(){

                $('#metaForm').on('submit', function(event){
                    event.preventDefault();

                    // console.log('hello');
                    $.ajax({
                        type:"POST",
                        url:"{{route('metadata')}}",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data){


                            var meta_title = data.data.title;
                            var meta_description = data.data.description;
                            var meta_image = data.data.image;


                            // var meta_title = data.data.title;
                            console.log(data)
                            console.log(meta_title)
                            console.log(meta_description)
                            // console.log(data.data.site_name)
                            console.log(meta_image)
                            // console.log(data.data.url)



                            $("#title").val( meta_title );
                            $("#description").val( meta_description );
                            // $("#image").val( meta_image );
                            $("#image").attr("src", meta_image)


                            // $('#metaFormModal').modal('show')

                        },
                        error:function(errors){
                            console.log(errors)
                        }
                    })
                });

            });
        </script>


    </body>
</html>

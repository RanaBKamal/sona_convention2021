<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sona Convention 2021</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mt-5 text-danger">.</h3>
                    <h3 class="text-center mt-5 text-danger">.</h3>
                    <h3 class="text-center mt-5 text-danger">.</h3>
                    <h3 class="text-center mt-5 text-danger">.</h3>
                    <h3 class="text-center mt-5 text-danger">Comming Soon</h3>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-targe="myModal" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <img src="{{asset('images/sona_convention_2021.png')}}" alt="cona-convention-2021" class="img-responsive">
            </div>
          </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            $('#myModal').modal('show');
        </script>
    </body>
</html>

















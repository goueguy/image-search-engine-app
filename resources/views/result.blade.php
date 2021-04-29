<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>MOTEUR DE RECHERCHE D'IMAGES</title>
</head>
<body>
    <div class="container mt-5">
       
        <div class="row">
            <div class="col-lg-6 offset-lg-3 ">
                
                <form action="{{route('pictures.find')}}" method="POST" class="formulaire">
                    @csrf
                    <h2 class="text-center mb-4 display-3 font-weight-bold">Joogle</h2>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Entrer le nom de votre image.....">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-block rounded-0">RECHERCHER</button>
                </form>
            </div>
            <div class="col-lg-6 offset-lg-3">
                <div class="row">
                    @if(count($pictures)>0)
                        @foreach ($pictures as $picture)
                            <div class="col-lg-3">
                                
                                    <img src="/pictures/{{$picture->file}}" class="w-100 h-100 img-thumbnail" clalt="">
                               
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            <div class="alert alert-success text-center">
                                <p>Cette image n'existe pas dans notre base de données</p>
                            </div>
                        </div>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
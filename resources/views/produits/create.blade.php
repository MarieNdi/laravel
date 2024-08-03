<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commande Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Produits Store</h3>
    </div>
    <div class="container">
        
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Create Produits</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('produits.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Name:</label>
                                <input type="text" class="form-control form-control-lg @error('nom_produits') is-invalid @enderror" placeholder="nom_produits" name="nom_produits" value="{{ old('nom_produits') }}">
                                @error('nom_produits')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">price:</label>
                                <input type="text" class="form-control form-control-lg @error('price') is-invalid @enderror" placeholder="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-lg btn-primary" placeholder="Submit" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

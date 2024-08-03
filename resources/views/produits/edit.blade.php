<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Edit Produit</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Editer Produit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produits.update', $produits->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nom_produits" class="form-label">Nom Produit</label>
                                <input type="text" class="form-control" id="nom_produits" name="nom_produits" value="{{ old('nom_produits', $produits->nom_produits) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $produits->price) }}" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Mettre à jour</button>
                            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

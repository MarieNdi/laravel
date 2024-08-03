<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Créer une nouvelle Commande</h2>
                <form action="{{ route('commande.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence</label>
                        <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="produits_id" class="form-label">Produit</label>
                        <select class="form-control" id="produits_id" name="produits_id" required>
                            <option value="">Sélectionner un produit</option>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->nom_produits }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                    <a href="{{ route('commande.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

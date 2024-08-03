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
        <div class="row justify-content-center mt-4">
        <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('commande.create') }}" class="btn btn-primary">Créer une Commande</a>
                    <a href="{{ route('produits.create') }}" class="btn btn-primary">Créer produits</a>
                </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">produits</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @if ($produits->isNotEmpty())
                                @foreach ($produits as $produits)
                                    <tr>
                                        <td>{{ $produits->id }}</td>
                                        <td>{{ $produits->nom_produits }}</td>
                                        <td>{{ $produits->price }}</td>
                                        <td>
                                            <a href="{{ route('produits.edit', $produits->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('produits.destroy', $produits->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer cette commande ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Aucune commande trouvée.</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

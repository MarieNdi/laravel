<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commande Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h2>Liste des Commandes</h2>
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('commande.create') }}" class="btn btn-primary">Créer une Commande</a>
                    <a href="{{ route('produits.create') }}" class="btn btn-primary">Créer produits</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Référence</th>
                            <th>Produit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commande as $cmd)
                            <tr>
                                <td>{{ $cmd->id }}</td>
                                <td>{{ $cmd->reference }}</td>
                                <td>{{ $cmd->produits->nom_produits }}</td>
                                <td>
                                    <a href="{{ route('commande.edit', $cmd->id) }}" class="btn btn-warning">Éditer</a>
                                    <form action="{{ route('commande.destroy', $cmd->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?');">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Locadora de Veículos - Carros</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🚗 Carros Disponíveis</h2>
        <a href="{{ route('carros.index') }}" class="btn btn-primary">
            + Novo Carro
        </a>
    </div>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabela -->
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Placa</th>
                        <th>Cor</th>
                        <th>Ano</th>
                        <th>Valor Diária</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($carros as $carro)
                        <tr>
                            <td>{{ $carro->id }}</td>
                            <td>{{ $carro->modelo }}</td>
                            <td>{{ $carro->marca }}</td>
                            <td>{{ $carro->placa }}</td>
                            <td>{{ $carro->cor }}</td>
                            <td>{{ $carro->ano_veiculo }}</td>
                            <td>R$ {{ number_format($carro->valor_diaria, 2, ',', '.') }}</td>

                            <td class="text-center">
                                <a href="{{ route('carros.update', $carro->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('carros.destroy', $carro->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Deseja excluir este carro?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                Nenhum carro cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

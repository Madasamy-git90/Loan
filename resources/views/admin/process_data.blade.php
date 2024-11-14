<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMI Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container">
    <h1 class="text-center mt-5">Process EMI Details</h1>
    
    <!-- Process Data Button -->
    <form method="POST" action="{{ route('processData') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Process Data</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger mt-4">{{ session('error') }}</div>
    @endif
</div>

@if(isset($emiDetails) && $emiDetails->isNotEmpty())
    <div class="container mt-4">
        <h2 class="text-center mb-4">EMI Details</h2>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Client ID</th>
                    @foreach(array_keys((array)$emiDetails->first()) as $column)
                        @if($column !== 'clientid')
                            <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($emiDetails as $row)
                    <tr>
                        <td>{{ $row->clientid }}</td>
                        @foreach((array)$row as $key => $value)
                            @if($key !== 'clientid')
                                <td>{{ number_format($value, 2) }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
``

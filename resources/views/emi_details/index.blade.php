<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.container {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #444;
    font-size: 28px;
    font-weight: bold;
}

.table {
    margin-top: 20px;
    border-collapse: collapse;
    font-size: 16px;
}

.table thead {
    background-color: #343a40;
    color: #fff;
}

.table-hover tbody tr:hover {
    background-color: #f1f3f5;
}

.table td, .table th {
    text-align: center;
    vertical-align: middle;
    padding: 10px;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-responsive {
    overflow-x: auto;
}

</style>
<div class="container mt-4">
    <h1 class="text-center mb-4">EMI Details</h1>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Client ID</th>
                    @if($emiDetails->isNotEmpty())
                        @foreach(array_keys((array)$emiDetails->first()) as $column)
                            @if($column !== 'clientid')
                                <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                            @endif
                        @endforeach
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($emiDetails as $row)
                    <tr>
                        <td>{{ $row->clientid }}</td>
                        @foreach((array)$row as $key => $value)
                            @if($key !== 'clientid')
                                <td class="text-end">{{ number_format($value, 2) }}</td>
                            @endif
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



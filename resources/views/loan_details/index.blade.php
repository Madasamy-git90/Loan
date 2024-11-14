<style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f6f9;
    color: #333;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #444;
    font-size: 24px;
    font-weight: bold;
}

.table {
    margin-top: 20px;
    border-collapse: collapse;
    font-size: 16px;
}

.table thead {
    background-color: #343a40;
    color: #ffffff;
    text-align: center;
}

.table-hover tbody tr:hover {
    background-color: #f1f3f5;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table td, .table th {
    padding: 12px;
    text-align: center;
    vertical-align: middle;
}

.table td.text-end {
    text-align: right;
}

.table-responsive {
    overflow-x: auto;
}

</style>
<div class="container mt-4">
    <h1 class="text-center mb-4">Loan Details</h1>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Client ID</th>
                    <th>Number of Payments</th>
                    <th>First Payment Date</th>
                    <th>Last Payment Date</th>
                    <th>Loan Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($loanDetails as $loan)
                    <tr>
                        <td>{{ $loan->clientid }}</td>
                        <td>{{ $loan->num_of_payment }}</td>
                        <td>{{ $loan->first_payment_date }}</td>
                        <td>{{ $loan->last_payment_date }}</td>
                        <td class="text-end">${{ number_format($loan->loan_amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No loan details available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

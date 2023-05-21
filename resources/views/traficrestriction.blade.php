@extends('template')

@section('content')
    <h1>Traffic restriction</h1>
    <p>The following data contains the traffic restriction data of a report in 2010.</p>

    <p>Chart:</p>
    <canvas id="trafficChart"></canvas>

    <!-- Add a search input field -->
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Traffic Restrictions</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Road Number</th>
                                <th>From Point</th>
                                <th>To Point</th>
                                <th>Settlement</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Naming</th>
                                <th>Extent</th>
                                <th>Speed</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($restrictions as $restriction)
                                <tr>
                                    <td>{{ $restriction->roadnumber }}</td>
                                    <td>{{ $restriction->frompoint }}</td>
                                    <td>{{ $restriction->topoint }}</td>
                                    <td>{{ $restriction->settlement }}</td>
                                    <td>{{ $restriction->fromdate }}</td>
                                    <td>{{ $restriction->todate }}</td>
                                    <td>{{ $restriction->naming->nev }}</td>
                                    <td>{{ $restriction->extent->nev }}</td>
                                    <td>{{ $restriction->speed }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $restrictions->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Retrieve the data from the PHP variables
        const restrictions = {!! json_encode($restrictions) !!};

        // Extract necessary data for the chart
        const roadNumbers = restrictions.data.map(restriction => restriction.roadnumber);
        const speeds = restrictions.data.map(restriction => restriction.speed);

        // Create the chart
        const ctx = document.getElementById('trafficChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: roadNumbers,
                datasets: [{
                    label: 'Speed Limit',
                    data: speeds,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Function to filter and render the table rows based on search input
        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();

            const filteredRows = restrictions.data.filter(row => {
                const rowText = Object.values(row).join(' ').toLowerCase();
                return rowText.includes(searchValue);
            });

            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = '';

            filteredRows.forEach(row => {
                const tr = document.createElement('tr');

                const roadNumberTd = document.createElement('td');
                roadNumberTd.textContent = row.roadnumber;
                tr.appendChild(roadNumberTd);

                const fromPointTd = document.createElement('td');
                fromPointTd.textContent = row.frompoint;
                tr.appendChild(fromPointTd);

                const toPointTd = document.createElement('td');
                toPointTd.textContent = row.topoint;
                tr.appendChild(toPointTd);

                const settlementTd = document.createElement('td');
                settlementTd.textContent = row.settlement;
                tr.appendChild(settlementTd);

                const fromDateTd = document.createElement('td');
                fromDateTd.textContent = row.fromdate;
                tr.appendChild(fromDateTd);

                const toDateTd = document.createElement('td');
                toDateTd.textContent = row.todate;
                tr.appendChild(toDateTd);

                const namingTd = document.createElement('td');
                namingTd.textContent = row.naming.nev;
                tr.appendChild(namingTd);

                const extentTd = document.createElement('td');
                extentTd.textContent = row.extent.nev;
                tr.appendChild(extentTd);

                const speedTd = document.createElement('td');
                speedTd.textContent = row.speed;
                tr.appendChild(speedTd);

                tableBody.appendChild(tr);
            });
        }

        // Event listener for search input
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', filterTable);
    </script>
@endsection

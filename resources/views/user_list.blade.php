<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agha Noor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        h1 {
            color: gold;
            animation: slide 3s infinite;
            white-space: nowrap;
            text-align: center;
        }

        h2 {
            color: gold;
            text-align: center;
            margin: auto;
        }
        .table {
            background-color: #222;
            border-radius: 8px;
            margin-top: 20px;
            width: 100%;
            border: 2px solid #444;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }
        th, td {
            text-align: center;
            vertical-align: middle;
            border: none;
        }
        th {
            background-color: #444;
        }
        .btn {
            margin: auto;
        }
        .input-group {
            width: 100%;
        }
        .form-control, .btn-info {
            height: 50px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .table tbody tr:hover {
            background-color: #555;
            color: #fff;
            cursor: pointer;
        }
        .modal-img {
            max-width: 100%;
            max-height: 300px;
        }
     @media print {
    .no-print,
    .edit-column,
    .delete-column {
        display: none !important;
    }

    .status-cell {
        display: table-cell !important;
    }

    .table {
        border: none;
    }

    th, td {
        border: 1px solid #444;
    }

    body {
        background-color: #fff;
        color: #000;
    }

    .total-yardage-section {
        page-break-before: always;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <div class="col-lg-10 mx-auto shadow-lg mt-5 p-4">
            <h1>Agha Noor Fabric Inventory</h1>
            <div class="mb-3">
                <a href="/form">
                    <button class="btn btn-primary no-print">Add Fabric</button>
                </a>
                <button class="btn btn-secondary no-print" onclick="window.print()">
                    <i class="bi bi-printer"></i> Print
                </button>
            </div>
            <form action="{{ route('user.index') }}" method="GET" class="mb-3 no-print">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by Category & Color">
                    <button class="btn btn-info" type="submit">Search</button>
                </div>
            </form>

            <table class="table table-striped" id="fabricTable">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Category</th>
                        <th>Shade</th>
                        <th>Image</th>
                        <th>Fabric</th>
                        <th>Color</th>
                        <th>Yards</th>
                        <th>Status</th>
                        <th class="edit-column no-print">Edit</th>
                        <th class="delete-column no-print">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $item)
                    <tr data-bs-toggle="modal" data-bs-target="#infoModal{{ $item->id }}" class="clickable-row">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->shade }}</td>
                        <td>
                            <img src="{{ asset('storage/' .$item->image_path) }}" alt="" style="width: 100px; height: 100px;" class="img-thumbnail">
                        </td>
                        <td>{{ $item->fabric }}</td>
                        <td class="yardage">{{ $item->color }}</td>
                        <td class="yardage">{{ $item->yards }}</td>
                        <td class="status-cell">{{ $item->status }}</td>
                        <td  class="edit-column no-print">
                            <button class="btn btn-info" style="height:39px" onclick="confirmPassword('update', {{ $item->id }})">Update</button>
                        </td>
                        <td  class="delete-column no-print">
                            <form id="deleteForm{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmPassword('delete', {{ $item->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="infoModal{{ $item->id }}" tabindex="-1" aria-labelledby="infoModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel{{ $item->id }}">{{ $item->brand }} - {{ $item->fabric }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('storage/' .$item->image_path) }}" alt="" class="modal-img">
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Brand:</strong> {{ $item->brand }}</p>
                                            <p><strong>Shade:</strong> {{ $item->shade }}</p>
                                            <p><strong>Fabric:</strong> {{ $item->fabric }}</p>
                                            <p><strong>Color:</strong> {{ $item->color }}</p>
                                            <p><strong>Yards:</strong> {{ $item->yards }}</p>
                                            <p><strong>Status:</strong> {{ $item->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            
            <div class="total-yardage-section">
                <h2>Total Fabric Yardage</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fabric</th>
                            <th>Total Yardage</th>
                        </tr>
                    </thead>
                    <tbody id="totalYardageTable">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Total Fabric</strong></td>
                            <td id="grandTotal" class="fw-bold">0 yards</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        function confirmPassword(action, id) {
            const password = prompt("Please enter your password:");
            if (password === "admin00") {
                if (action === 'update') {
                    window.location.href = `/user/edit/${id}`;
                } else if (action === 'delete') {
                    if (confirm("Are you sure you want to delete this item?")) {
                        document.getElementById(`deleteForm${id}`).submit();
                    }
                }
            } else {
                alert("Incorrect password. Please try again.");
            }
        }

        function calculateTotals() {
            const yardageCells = document.querySelectorAll('.yardage');
            const totalYardage = {};
            let grandTotal = 0;

            yardageCells.forEach(cell => {
                const fabric = cell.closest('tr').querySelector('td:nth-child(5)').innerText;
                const yards = parseFloat(cell.innerText) || 0;

                if (totalYardage[fabric]) {
                    totalYardage[fabric] += yards;
                } else {
                    totalYardage[fabric] = yards;
                }
                grandTotal += yards;
            });

            const totalYardageTable = document.getElementById('totalYardageTable');
            totalYardageTable.innerHTML = '';

            for (const fabric in totalYardage) {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${fabric}</td><td>${totalYardage[fabric]} yards</td>`;
                totalYardageTable.appendChild(row);
            }

            document.getElementById('grandTotal').innerText = `${grandTotal} yards`;
        }

        window.onload = calculateTotals;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

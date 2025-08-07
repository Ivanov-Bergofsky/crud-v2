<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            min-height: 100vh;
            padding-top: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #2a4cb3 100%);
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 25px 30px;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: none;
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            border-bottom: 1px solid #e3e6f0;
            padding: 15px 20px;
            font-weight: 700;
            font-size: 1.2rem;
            border-radius: 10px 10px 0 0 !important;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: #2a4cb3;
            transform: translateY(-2px);
        }
        
        .btn-sm {
            padding: 5px 12px;
            font-size: 0.85rem;
        }
        
        .action-buttons .btn {
            margin-right: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .table th {
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            color: var(--dark-color);
            font-weight: 700;
            border-top: none;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }
        
        .alert-success {
            background: rgba(28, 200, 138, 0.15);
            border: 1px solid rgba(28, 200, 138, 0.3);
            color: #0f6848;
            border-radius: 8px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 5rem;
            margin-bottom: 20px;
            color: #d1d3e2;
        }
        
        .stat-card {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .stat-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .students-count {
            background: linear-gradient(135deg, rgba(78, 115, 223, 0.15) 0%, rgba(78, 115, 223, 0.05) 100%);
            color: var(--primary-color);
        }
        
        .footer {
            text-align: center;
            padding: 20px;
            color: var(--secondary-color);
            font-size: 0.9rem;
            margin-top: 30px;
        }
        
        .action-buttons {
            white-space: nowrap;
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                display: flex;
                flex-direction: column;
            }
            
            .action-buttons .btn {
                margin-bottom: 8px;
                margin-right: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header mb-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-user-graduate me-3"></i>Student Management System</h1>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="{{ route('students.create') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-plus-circle me-2"></i>Add New Student
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card students-count">
                    <i class="fas fa-users"></i>
                    <h3>24 Students</h3>
                    <p>Currently enrolled</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(28, 200, 138, 0.15) 0%, rgba(28, 200, 138, 0.05) 100%); color: var(--success-color);">
                    <i class="fas fa-book"></i>
                    <h3>14 Courses</h3>
                    <p>Available</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(246, 194, 62, 0.15) 0%, rgba(246, 194, 62, 0.05) 100%); color: var(--warning-color);">
                    <i class="fas fa-chart-line"></i>
                    <h3>92%</h3>
                    <p>Average GPA</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(231, 74, 59, 0.15) 0%, rgba(231, 74, 59, 0.05) 100%); color: var(--danger-color);">
                    <i class="fas fa-user-clock"></i>
                    <h3>3 Pending</h3>
                    <p>Registrations</p>
                </div>
            </div>
        </div>
        
        <!-- Success Message -->
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Student List -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list me-2"></i>Student Records</span>
                <div class="d-flex">
                    <input type="text" class="form-control form-control-sm me-2" placeholder="Search students...">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-filter me-1"></i>Filter
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Enrollment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            JS
                                        </div>
                                        <div>
                                            <strong>John Smith</strong>
                                            <div class="text-muted small">Computer Science</div>
                                        </div>
                                    </div>
                                </td>
                                <td>john.smith@example.com</td>
                                <td>(555) 123-4567</td>
                                <td>2023-09-15</td>
                                <td class="action-buttons">
                                    <a href="{{ route('students.edit', 1001) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('students.destroy', 1001) }}" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>1002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-3 bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            MJ
                                        </div>
                                        <div>
                                            <strong>Maria Johnson</strong>
                                            <div class="text-muted small">Business Admin</div>
                                        </div>
                                    </div>
                                </td>
                                <td>maria.j@example.com</td>
                                <td>(555) 987-6543</td>
                                <td>2023-08-22</td>
                                <td class="action-buttons">
                                    <a href="{{ route('students.edit', 1002) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('students.destroy', 1002) }}" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>1003</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-3 bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            RW
                                        </div>
                                        <div>
                                            <strong>Robert Williams</strong>
                                            <div class="text-muted small">Electrical Eng</div>
                                        </div>
                                    </div>
                                </td>
                                <td>robert.w@example.com</td>
                                <td>(555) 456-7890</td>
                                <td>2023-09-05</td>
                                <td class="action-buttons">
                                    <a href="{{ route('students.edit', 1003) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('students.destroy', 1003) }}" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>1004</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-3 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            ED
                                        </div>
                                        <div>
                                            <strong>Emily Davis</strong>
                                            <div class="text-muted small">Psychology</div>
                                        </div>
                                    </div>
                                </td>
                                <td>emily.d@example.com</td>
                                <td>(555) 234-5678</td>
                                <td>2023-08-30</td>
                                <td class="action-buttons">
                                    <a href="{{ route('students.edit', 1004) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('students.destroy', 1004) }}" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="footer">
            <p>© 2023 Student Management System | Built with <i class="fas fa-heart text-danger"></i> for educational institutions</p>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
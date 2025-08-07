<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --warning-color: #f6c23e;
            --light-color: #f8f9fc;
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .form-container {
            max-width: 700px;
            width: 100%;
            animation: slideIn 0.6s ease-out;
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d4a82a 100%);
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 25px 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .form-header h1 {
            font-weight: 700;
            letter-spacing: 0.5px;
            margin: 0;
        }
        
        .form-card {
            background: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .form-icon {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d4a82a 100%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -60px auto 20px;
            box-shadow: 0 5px 15px rgba(246, 194, 62, 0.4);
        }
        
        .form-icon i {
            font-size: 2.5rem;
            color: white;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 2px solid #e3e6f0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--warning-color);
            box-shadow: 0 0 0 0.25rem rgba(246, 194, 62, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }
        
        .btn-warning {
            background: var(--warning-color);
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 8px;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 15px;
            color: #fff;
        }
        
        .btn-warning:hover {
            background: #d4a82a;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(246, 194, 62, 0.4);
        }
        
        .btn-outline-secondary {
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 10px;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            font-weight: 600;
        }
        
        .btn-outline-secondary:hover {
            background: #f8f9fc;
            transform: translateY(-3px);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--warning-color);
            font-weight: 600;
            margin-bottom: 20px;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .back-link:hover {
            color: #d4a82a;
            transform: translateX(-5px);
        }
        
        .required-star {
            color: #e74a3b;
            margin-left: 3px;
        }
        
        .student-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(246, 194, 62, 0.3);
            margin: 0 auto 20px;
            display: block;
        }
        
        .avatar-edit {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: var(--warning-color);
            color: white;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .avatar-container {
            position: relative;
            width: fit-content;
            margin: 0 auto 25px;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @media (max-width: 576px) {
            .form-container {
                margin-top: 20px;
            }
            
            .form-header {
                padding: 20px;
            }
            
            .form-icon {
                width: 70px;
                height: 70px;
                margin-top: -50px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header text-center">
            <h1><i class="fas fa-user-edit me-2"></i>Edit Student Information</h1>
        </div>
        
        <div class="form-card">
            <div class="form-icon">
                <i class="fas fa-user-edit"></i>
            </div>
            
            <a href="{{ route('students.index') }}" class="back-link">
                <i class="fas fa-arrow-left me-2"></i> Back to Students List
            </a>
            
            <form method="POST" action="{{ route('students.update', $student->id) }}" class="needs-validation" novalidate>
                @csrf @method('PUT')
                
                <div class="avatar-container">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=f6c23e&color=fff&size=200" 
                         alt="Student Avatar" class="student-avatar">
                    <div class="avatar-edit">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="name" class="form-label">Full Name <span class="required-star">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-user text-warning"></i></span>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ $student->name }}" placeholder="Enter student's full name" required>
                        <div class="invalid-feedback">
                            Please enter the student's name.
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="form-label">Email Address <span class="required-star">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope text-warning"></i></span>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ $student->email }}" placeholder="Enter student's email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone Number <span class="required-star">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-phone text-warning"></i></span>
                        <input type="tel" class="form-control" id="phone" name="phone" 
                               value="{{ $student->phone }}" placeholder="Enter student's phone number" required>
                        <div class="invalid-feedback">
                            Please enter a phone number.
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user-check text-warning"></i></span>
                            <select class="form-select" id="status" name="status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                                <option value="graduated">Graduated</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="enrollment_date" class="form-label">Enrollment Date</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar text-warning"></i></span>
                            <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" 
                                   value="2023-09-01">
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" 
                              placeholder="Enter any additional notes about the student" 
                              rows="3">Hardworking student with excellent participation in class discussions.</textarea>
                </div>
                
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save me-2"></i> Update Student Record
                </button>
                
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Cancel Changes
                </a>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        (function () {
            'use strict'
            
            var forms = document.querySelectorAll('.needs-validation')
            
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        
        // Phone number formatting
        document.getElementById('phone').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
        
        // Avatar edit simulation
        document.querySelector('.avatar-edit').addEventListener('click', function() {
            alert('Avatar edit functionality would open a file dialog in a real application');
        });
    </script>
</body>
</html>
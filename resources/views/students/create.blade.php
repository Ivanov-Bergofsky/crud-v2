<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
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
            animation: fadeIn 0.6s ease-out;
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #2a4cb3 100%);
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
            background: linear-gradient(135deg, var(--primary-color) 0%, #2a4cb3 100%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -60px auto 20px;
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
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
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 8px;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 15px;
        }
        
        .btn-primary:hover {
            background: #2a4cb3;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
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
        
        .form-divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--secondary-color);
            margin: 25px 0;
        }
        
        .form-divider::before,
        .form-divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px dashed #e3e6f0;
        }
        
        .form-divider::before {
            margin-right: 15px;
        }
        
        .form-divider::after {
            margin-left: 15px;
        }
        
        .illustration-container {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }
        
        .student-illustration {
            max-width: 250px;
            opacity: 0.9;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .back-link:hover {
            color: #2a4cb3;
            transform: translateX(-5px);
        }
        
        .required-star {
            color: #e74a3b;
            margin-left: 3px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            <h1><i class="fas fa-user-graduate me-2"></i>Add New Student</h1>
        </div>
        
        <div class="form-card">
            <div class="form-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            
            <a href="{{ route('students.index') }}" class="back-link">
                <i class="fas fa-arrow-left me-2"></i> Back to Students List
            </a>
            
            <form method="POST" action="{{ route('students.store') }}" class="needs-validation" novalidate>
                @csrf
                
                <div class="illustration-container">
                    <svg class="student-illustration" viewBox="0 0 500 300" xmlns="http://www.w3.org/2000/svg">
                        <rect x="50" y="100" width="400" height="180" rx="20" fill="#4e73df" opacity="0.1" />
                        <circle cx="250" cy="100" r="60" fill="#4e73df" opacity="0.1" />
                        <circle cx="250" cy="90" r="30" fill="#4e73df" opacity="0.2" />
                        <rect x="220" y="120" width="60" height="120" rx="10" fill="#4e73df" opacity="0.2" />
                        <path d="M190 240 L310 240" stroke="#4e73df" stroke-width="8" stroke-linecap="round" opacity="0.3" />
                    </svg>
                </div>
                
                <div class="mb-4">
                    <label for="name" class="form-label">Full Name <span class="required-star">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter student's full name" required>
                        <div class="invalid-feedback">
                            Please enter the student's name.
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="form-label">Email Address <span class="required-star">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter student's email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone Number <span class="required-star">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter student's phone number" required>
                        <div class="invalid-feedback">
                            Please enter a phone number.
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar text-primary"></i></span>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="course" class="form-label">Course</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-book text-primary"></i></span>
                            <select class="form-select" id="course" name="course">
                                <option selected disabled>Select course</option>
                                <option>Computer Science</option>
                                <option>Business Administration</option>
                                <option>Electrical Engineering</option>
                                <option>Psychology</option>
                                <option>Biology</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-divider">
                    <span>Additional Information (Optional)</span>
                </div>
                
                <div class="mb-4">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Enter student's address" rows="3"></textarea>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Save Student Record
                </button>
                
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Cancel
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
    </script>
</body>
</html>
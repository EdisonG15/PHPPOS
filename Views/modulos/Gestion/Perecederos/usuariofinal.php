<!-- Google Fonts - Poppins -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
<!-- Bootstrap CSS -->
<style>
  /* Google Fonts - Poppins */
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    /* Lighter background */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }

  .card {
    border-radius: 15px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    /* More pronounced shadow */
    overflow: hidden;
    /* Ensures rounded corners */
  }

  /* Stepper Styles */
  .stepper-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    padding: 0 15%;
    /* Increased padding for better spacing */
  }

  .stepper-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 1;
    flex-grow: 1;
    /* Allow items to grow and push lines */
    cursor: pointer;
    /* Make stepper items clickable */
  }

  .stepper-icon-container {
    /* New container for icon and background */
    width: 55px;
    /* Slightly larger icon */
    height: 55px;
    border-radius: 50%;
    background-color: #e9ecef;
    /* Light gray */
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    border: 2px solid #e9ecef;
    /* Default border */
  }

  .stepper-icon {
    color: #6c757d;
    /* Darker gray icon */
  }

  .stepper-label {
    text-align: center;
    font-size: 0.95rem;
    /* Slightly larger label */
    color: #495057;
    /* Darker label text */
    margin-top: 10px;
    font-weight: 500;
  }

  .stepper-sublabel {
    font-size: 0.8rem;
    color: #adb5bd;
    font-weight: 400;
  }

  .stepper-item.active .stepper-icon-container {
    background-color: #6f42c1;
    /* Purple */
    border-color: #6f42c1;
    /* Active border */
  }

  .stepper-item.active .stepper-icon {
    color: white;
  }

  .stepper-item.active .stepper-label {
    color: #6f42c1;
    /* Purple */
    font-weight: 600;
    /* More prominent active label */
  }

  .stepper-line {
    position: absolute;
    width: calc(100% - 30%);
    /* Adjusted width to fit between icons */
    height: 2px;
    background-color: #dee2e6;
    /* Lighter line color */
    top: 27px;
    /* Half of icon height + border */
    left: 15%;
    /* Start from the edge of the first item's padding */
    z-index: 0;
    transition: background-color 0.3s ease;
  }

  .stepper-item.completed .stepper-icon-container {
    background-color: #28a745;
    /* Green for completed */
    border-color: #28a745;
  }

  .stepper-item.completed .stepper-icon {
    color: white;
  }

  .stepper-item.completed .stepper-label {
    color: #495057;
    /* Keep label color for completed */
  }

  .stepper-item.completed .stepper-sublabel {
    color: #6c757d;
    /* Keep sublabel color for completed */
  }

  /* Line between completed and active step */
  .stepper-item.completed+.stepper-line {
    background-color: #28a745;
    /* Green line */
  }

  /* Adjust line length for smaller screens */
  @media (max-width: 768px) {
    .stepper-wrapper {
      padding: 0 5%;
      flex-wrap: wrap;
      /* Allow items to wrap */
      justify-content: center;
    }

    .stepper-item {
      margin-bottom: 20px;
      /* Space between wrapped items */
      flex-grow: 0;
      /* Don't grow on small screens */
      width: 30%;
      /* Approximate width for each item on small screens */
    }

    .stepper-line {
      display: none;
      /* Hide line on small screens for cleaner layout */
    }
  }

  /* Form Step Transition */
  .form-step {
    display: none;
    animation: fadeIn 0.5s ease-out;
    /* Smooth fade-in animation */
  }

  .form-step.active {
    display: block;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Custom styling for form elements */
  .form-title {
    color: #343a40;
    font-weight: 600;
    font-size: 1.75rem;
  }

  .form-subtitle {
    color: #6c757d;
    font-size: 1rem;
    margin-bottom: 20px;
  }

  .form-label {
    font-weight: 500;
    color: #495057;
    margin-bottom: 8px;
    /* More space below labels */
  }

  .form-control,
  .form-select {
    border-radius: 10px;
    /* More rounded corners */
    padding: 12px 18px;
    /* Increased padding */
    border: 1px solid #e0e0e0;
    /* Lighter border color */
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
    /* Subtle inner shadow */
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
  }

  .form-control:focus,
  .form-select:focus {
    border-color: #8c72cf;
    /* Purple border on focus */
    box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.2);
    /* Purple shadow on focus */
    outline: none;
  }

  /* Input validation styling */
  .form-control.is-invalid,
  .form-select.is-invalid {
    border-color: #dc3545;
    /* Red border */
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.2);
    /* Red shadow on invalid */
    padding-right: calc(1.5em + 0.75rem);
    /* Space for validation icon */
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
  }

  .invalid-feedback {
    color: #dc3545;
    /* Red text for feedback */
    font-size: 0.85em;
    margin-top: 0.5rem;
    /* More space for feedback */
    display: none;
    /* Hidden by default */
  }

  .form-control.is-invalid+.invalid-feedback {
    display: block;
    /* Show when input is invalid */
  }

  .form-select.is-invalid+.invalid-feedback {
    display: block;
    /* Show when select is invalid */
  }


  /* Password toggle button */
  .input-group .btn-outline-secondary {
    border-top-right-radius: 10px;
    /* Match input border-radius */
    border-bottom-right-radius: 10px;
    border-left: 1px solid #e0e0e0;
    /* Match input border */
    border-color: #e0e0e0;
    color: #6c757d;
    background-color: #f8f9fa;
    /* Light background for button */
    transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
  }

  .input-group .btn-outline-secondary:hover {
    background-color: #e9ecef;
    color: #495057;
    border-color: #d1d4d8;
  }

  .input-group .btn-outline-secondary:focus {
    box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.2);
    /* Purple shadow on focus */
    border-color: #8c72cf;
    outline: none;
  }

  /* Buttons */
  .btn {
    border-radius: 10px;
    /* Consistent rounded corners */
    padding: 12px 30px;
    /* Increased padding */
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .btn-primary {
    background-color: #6f42c1;
    /* Purple */
    border-color: #6f42c1;
  }

  .btn-primary:hover {
    background-color: #5a36a3;
    /* Darker purple */
    border-color: #5a36a3;
    transform: translateY(-2px);
    /* Slight lift on hover */
    box-shadow: 0 4px 10px rgba(111, 66, 193, 0.3);
  }

  .btn-outline-secondary {
    border-color: #ced4da;
    color: #6c757d;
    background-color: white;
  }

  .btn-outline-secondary:hover {
    background-color: #e9ecef;
    border-color: #dee2e6;
    color: #495057;
    transform: translateY(-2px);
    /* Slight lift on hover */
    box-shadow: 0 4px 10px rgba(108, 117, 125, 0.1);
  }

  .btn-success {
    background-color: #28a745;
    /* Green */
    border-color: #28a745;
  }

  .btn-success:hover {
    background-color: #218838;
    /* Darker green */
    border-color: #1e7e34;
    transform: translateY(-2px);
    /* Slight lift on hover */
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
  }

  /* Plan Card Styling */
  .plan-card-wrapper input[type="radio"] {
    display: none;
    /* Hide the default radio button */
  }

  .plan-card-wrapper .plan-content {
    cursor: pointer;
    border: 1px solid #e0e0e0;
    /* Light gray border */
    border-radius: 12px;
    /* More rounded corners */
    transition: all 0.3s ease;
    padding: 25px;
    /* Increased padding */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    /* Subtle shadow */
    background-color: #ffffff;
  }

  .plan-card-wrapper .plan-content:hover {
    border-color: #8c72cf;
    /* Purple border on hover */
    box-shadow: 0 4px 15px rgba(111, 66, 193, 0.15);
    /* More pronounced shadow on hover */
    transform: translateY(-3px);
    /* Slight lift on hover */
  }

  .plan-card-wrapper input[type="radio"]:checked+.plan-content {
    border-color: #6f42c1;
    /* Purple border when checked */
    box-shadow: 0 5px 20px rgba(111, 66, 193, 0.25);
    /* Stronger shadow when checked */
    background-color: #f7f3fd;
    /* Very light purple background when active */
    transform: translateY(-3px);
    /* Stay lifted when active */
  }

  .plan-card-wrapper .plan-content .card-title {
    color: #6f42c1;
    /* Purple title */
    font-weight: 600;
    margin-bottom: 5px;
  }

  .plan-card-wrapper .plan-content .card-text {
    font-size: 0.9rem;
    color: #6c757d;
    min-height: 40px;
    /* Ensure consistent height for text */
  }

  .plan-card-wrapper .plan-content h3 {
    color: #6f42c1;
    font-weight: 700;
    font-size: 2.2rem;
    /* Larger price */
    margin-top: 15px;
  }

  .plan-card-wrapper .plan-content h3 small {
    font-size: 0.6em;
    color: #6c757d;
    font-weight: 400;
  }

  /* Helper classes */
  .text-purple {
    color: #6f42c1 !important;
  }

  /* Logo upload styles */
  .logo-upload-container {
    width: 150px;
    /* Adjust as needed */
    height: 150px;
    border-radius: 50%;
    background-color: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 1.2rem;
    color: #6c757d;
    border: 2px dashed #ced4da;
    cursor: pointer;
    overflow: hidden;
    position: relative;
  }

  .logo-upload-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: none;
    /* Hidden by default, shown when image is loaded */
  }

  .logo-upload-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    padding: 10px;
    font-size: 0.9rem;
  }

  .logo-upload-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 2;
  }

  .logo-upload-container:hover .logo-upload-overlay {
    opacity: 1;
  }
</style>

<div class="container my-5">
  <div class="card shadow-lg p-md-5 p-3">
    <!-- Stepper Navigation -->
    <div class="stepper-wrapper mb-5">
      <div class="stepper-item active" data-step="1">
        <div class="stepper-icon-container">
          <i class="fas fa-user-alt stepper-icon"></i>
        </div>
        <div class="stepper-label text-center">Account <br> <span class="stepper-sublabel">Details</span></div>
      </div>
      <div class="stepper-line"></div>
      <div class="stepper-item" data-step="2">
        <div class="stepper-icon-container">
          <i class="fas fa-address-card stepper-icon"></i>
        </div>
        <div class="stepper-label text-center">Personal <br> <span class="stepper-sublabel">Information</span></div>
      </div>
      <div class="stepper-line"></div>
      <div class="stepper-item" data-step="3">
        <div class="stepper-icon-container">
          <i class="fas fa-credit-card stepper-icon"></i>
        </div>
        <div class="stepper-label text-center">Billing <br> <span class="stepper-sublabel">Payment</span></div>
      </div>
    </div>

    <form id="multiStepForm" class="needs-validation" novalidate>
      <!-- Hidden input for logo URL (this is what you'd save to the database) -->
      <input type="hidden" id="logo_url" name="logo_url">

      <!-- Step 1: General Information (Account Information) -->
      <div class="form-step active" data-step="1">
        <h4 class="mb-3 form-title">Account Information</h4>
        <p class="form-subtitle">Enter your account details to get started.</p>

        <div class="row g-4">
          <div class="col-md-6">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="username" name="username" value="johndoe" required>
            <div class="invalid-feedback">
              Username is required.
            </div>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" value="john.doe@email.com" required>
            <div class="invalid-feedback">
              Please enter a valid email address.
            </div>
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" value="********" required>
              <button class="btn btn-outline-secondary toggle-password" type="button"><i class="fas fa-eye-slash"></i></button>
              <div class="invalid-feedback">
                Password is required.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="********" required>
              <button class="btn btn-outline-secondary toggle-password" type="button"><i class="fas fa-eye-slash"></i></button>
              <div class="invalid-feedback">
                Please confirm your password. Passwords must match.
              </div>
            </div>
          </div>
          <div class="col-12">
            <label for="profileLink" class="form-label">Profile Link</label>
            <input type="text" class="form-control" id="profileLink" name="profileLink" value="johndoe/profile">
          </div>
        </div>
        <div class="d-flex justify-content-end mt-5">
          <button type="button" class="btn btn-primary next-step">Next Step <i class="fas fa-arrow-right ms-2"></i></button>
        </div>
      </div>

      <!-- Step 2: Personal Information -->
      <div class="form-step" data-step="2">
        <h4 class="mb-3 form-title">Personal Information</h4>
        <p class="form-subtitle">Tell us a bit about yourself.</p>

        <div class="row g-4">
          <div class="col-md-6">
            <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="John" required>
            <div class="invalid-feedback">
              First Name is required.
            </div>
          </div>
          <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="Doe" required>
            <div class="invalid-feedback">
              Last Name is required.
            </div>
          </div>
          <div class="col-md-6">
            <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0">+1</span>
              <input type="tel" class="form-control" id="mobile" name="mobile" value="202 555 0111" required>
              <div class="invalid-feedback">
                Mobile number is required.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="pincode" class="form-label">Pincode <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Postal Code" required>
            <div class="invalid-feedback">
              Pincode is required.
            </div>
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" required>
            <div class="invalid-feedback">
              Address is required.
            </div>
          </div>
          <div class="col-12">
            <label for="landmark" class="form-label">Landmark (Optional)</label>
            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Apartment, suite, etc.">
          </div>
          <div class="col-md-6">
            <label for="city" class="form-label">City <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="city" name="city" value="Jackson" required>
            <div class="invalid-feedback">
              City is required.
            </div>
          </div>
          <div class="col-md-6">
            <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
            <select class="form-select" id="country" name="country" required>
              <option value="">Select a country</option>
              <option value="USA">United States</option>
              <option value="Canada">Canada</option>
              <option value="Mexico">Mexico</option>
              <option value="Ecuador" selected>Ecuador</option>
            </select>
            <div class="invalid-feedback">
              Country is required.
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-5">
          <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Previous</button>
          <button type="button" class="btn btn-primary next-step">Next Step <i class="fas fa-arrow-right ms-2"></i></button>
        </div>
      </div>

      <!-- Step 3: Billing Information (Select Plan & Payment) -->
      <div class="form-step" data-step="3">
        <h4 class="mb-3 form-title">Select Your Plan</h4>
        <p class="form-subtitle">Choose the plan that best suits your needs.</p>

        <div class="row mb-5 g-4">
          <div class="col-md-4">
            <label class="plan-card-wrapper">
              <input type="radio" name="plan" value="basic" class="form-check-input">
              <div class="card p-4 text-center plan-content">
                <h5 class="card-title text-purple">Basic</h5>
                <p class="card-text text-muted small">A simple start for startups & students.</p>
                <h3 class="mb-0 text-purple">$0<small class="text-muted fw-normal">/month</small></h3>
              </div>
            </label>
          </div>
          <div class="col-md-4">
            <label class="plan-card-wrapper">
              <input type="radio" name="plan" value="standard" class="form-check-input" checked>
              <div class="card p-4 text-center plan-content">
                <h5 class="card-title text-purple">Standard</h5>
                <p class="card-text text-muted small">Ideal for small to medium businesses.</p>
                <h3 class="mb-0 text-purple">$99<small class="text-muted fw-normal">/month</small></h3>
              </div>
            </label>
          </div>
          <div class="col-md-4">
            <label class="plan-card-wrapper">
              <input type="radio" name="plan" value="enterprise" class="form-check-input">
              <div class="card p-4 text-center plan-content">
                <h5 class="card-title text-purple">Enterprise</h5>
                <p class="card-text text-muted small">Robust solution for large organizations.</p>
                <h3 class="mb-0 text-purple">$499<small class="text-muted fw-normal">/year</small></h3>
              </div>
            </label>
          </div>
        </div>

        <h4 class="mb-3 form-title">Payment Information</h4>
        <p class="form-subtitle">Enter your card details securely.</p>

        <div class="row g-4">
          <div class="col-12">
            <label for="cardNumber" class="form-label">Card Number <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="1356 3215 6548 7898" required>
            <div class="invalid-feedback">
              Card Number is required.
            </div>
          </div>
          <div class="col-md-6">
            <label for="nameOnCard" class="form-label">Name On Card <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nameOnCard" name="nameOnCard" value="John Doe" required>
            <div class="invalid-feedback">
              Name on Card is required.
            </div>
          </div>
          <div class="col-md-3">
            <label for="expiryDate" class="form-label">Expiry Date <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
            <div class="invalid-feedback">
              Expiry Date is required.
            </div>
          </div>
          <div class="col-md-3">
            <label for="cvvCode" class="form-label">CVV Code <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="cvvCode" name="cvvCode" value="654" required>
            <div class="invalid-feedback">
              CVV Code is required.
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-5">
          <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Previous</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
<script>
  // Envuelva todo el script en un IIFE para crear un nuevo alcance
  (function() {
    let currentStep = 1;
    const formSteps = document.querySelectorAll('.form-step');
    const stepperItems = document.querySelectorAll('.stepper-item');
    const multiStepForm = document.getElementById('multiStepForm');
    // Función para actualizar la visibilidad del formulario y el paso a paso
    function updateFormSteps() {
      formSteps.forEach(step => step.classList.remove('active'));
      formSteps[currentStep - 1].classList.add('active');

      stepperItems.forEach((item, index) => {
        item.classList.remove('active', 'completed');
        if (index + 1 === currentStep) {
          item.classList.add('active');
        } else if (index + 1 < currentStep) {
          item.classList.add('completed');
        }
      });

      // Update button visibility
      // Use querySelector within the active form step to find its specific buttons
      const currentFormStepElement = formSteps[currentStep - 1];
      const prevBtn = currentFormStepElement.querySelector('.prev-step');
      const nextBtn = currentFormStepElement.querySelector('.next-step');
      const submitBtn = currentFormStepElement.querySelector('[type="submit"]');

      // Hide all navigation buttons first
      document.querySelectorAll('.prev-step, .next-step, [type="submit"]').forEach(btn => btn.classList.add('d-none'));

      // Show the specific buttons for the current step
      if (prevBtn) {
        prevBtn.classList.remove('d-none');
      }
      if (nextBtn) {
        nextBtn.classList.remove('d-none');
      }
      if (submitBtn) {
        submitBtn.classList.remove('d-none');
      }
    }

   // Función para validar las entradas del paso actual
    function validateCurrentStep() {
      const currentFormStep = formSteps[currentStep - 1];
      const requiredInputs = currentFormStep.querySelectorAll('[required]');
      let isValid = true;

      requiredInputs.forEach(input => {
        if (!input.checkValidity()) {
          input.classList.add('is-invalid');
          isValid = false;
        } else {
          input.classList.remove('is-invalid');
        }
      });

      // Validación específica para coincidencia de contraseña
      if (currentStep === 1) { // Assuming password fields are in step 1
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        if (password.value !== confirmPassword.value) {
          confirmPassword.classList.add('is-invalid');
          // Ensure the invalid-feedback element exists as a sibling for direct manipulation
          const feedbackElement = confirmPassword.nextElementSibling;
          if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
            feedbackElement.innerHTML = 'Passwords do not match.'; // Update feedback message
          }
          isValid = false;
        } else if (password.checkValidity() && confirmPassword.checkValidity()) {
          // Only remove invalid if both are valid and match
          confirmPassword.classList.remove('is-invalid');
        }
      }

      return isValid;
    }

   // Escuchadores de eventos para botones de navegación
    multiStepForm.addEventListener('click', (event) => {
      if (event.target.classList.contains('next-step')) {
        if (validateCurrentStep()) {
          if (currentStep < formSteps.length) {
            currentStep++;
            updateFormSteps();
          }
        }
      } else if (event.target.classList.contains('prev-step')) {
        // When going back, remove validation state from the step being left
        const previousFormStep = formSteps[currentStep - 1];
        previousFormStep.querySelectorAll('.is-invalid').forEach(input => {
          input.classList.remove('is-invalid');
        });

        if (currentStep > 1) {
          currentStep--;
          updateFormSteps();
        }
      }
    });

    // Escucha de eventos para clics en elementos paso a paso (navegación directa)
    stepperItems.forEach(item => {
      item.addEventListener('click', () => {
        const stepToGo = parseInt(item.dataset.step);
        // Allow direct navigation to previous or current step if it's valid
        if (stepToGo < currentStep) {
          // When going back, remove validation state from the step being left
          const previousFormStep = formSteps[currentStep - 1];
          previousFormStep.querySelectorAll('.is-invalid').forEach(input => {
            input.classList.remove('is-invalid');
          });
          currentStep = stepToGo;
          updateFormSteps();
        } else if (stepToGo === currentStep) {
          // Do nothing, already on this step
        } else { // Trying to go forward
          if (validateCurrentStep()) { // Validate current step before allowing to go forward
            currentStep = stepToGo;
            updateFormSteps();
          }
        }
      });
    });

   // Función para alternar la visibilidad de la contraseña
    document.querySelectorAll('.toggle-password').forEach(button => {
      button.addEventListener('click', () => {
        const passwordInput = button.previousElementSibling;
        const icon = button.querySelector('i');
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          icon.classList.remove('fa-eye-slash');
          icon.classList.add('fa-eye');
        } else {
          passwordInput.type = 'password';
          icon.classList.remove('fa-eye');
          icon.classList.add('fa-eye-slash');
        }
      });
    });


    // Handle form submission (for the last step)
    multiStepForm.addEventListener('submit', function(event) {
      if (!validateCurrentStep()) { // Validate last step before final submission
        event.preventDefault(); // Prevent default form submission if invalid
        event.stopPropagation();
      } else {
        event.preventDefault(); // Prevent default form submission for AJAX

        console.log('Form Submitted!');
        const formData = new FormData(this);
        const data = {};
        for (let [key, value] of formData.entries()) {
          data[key] = value;
        }
        console.log(data); // Log collected form data
      }
      multiStepForm.classList.add('was-validated'); // Add Bootstrap's was-validated class to show browser's validation styles
    });


    // Initial setup
    updateFormSteps();
    // Trigger click on logo area to allow file selection
    document.getElementById('logo-upload-area').addEventListener('click', function() {
      document.getElementById('logo-upload').click();
    });
  })(); // IIFE ends here
</script>
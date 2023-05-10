<?php 
  session_start();
  $patient_id =  $_SESSION['patient_id']; 
  $name = $_SESSION['name'];
 include 'unavbar.php'; ?>   
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booking an appointment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-RXdRUZ72MkRiR7Kj1MZrtI+2E5a5ntwLV5z+sWjlKgrP5N9tFVrMk14TwNNHDPMe0D1ELb/2COwleHc8z0/WTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-57NKyaJFZhCGbzEWz8uV7IJ+g1hhn2S2jZ/j+oJFupafyksGp4KsB4+8xv1MWnX9B0SzmjKnmqlTpfT0Hupufw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* Style for the body */
body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

/* Style for the form */
form {
  background-color: #ffffff;
  padding: 20px;
}

/* Style for the form header */
form h1 {
  margin-top: 0;
}

/* Style for the form input fields */
form input[type="number"],
form input[type="date"],
form input[type="time"],
form select,
form textarea {
  width: 100%;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
  font-size: 16px;
}

/* Style for the form input fields when they are focused */
form input[type="number"]:focus,
form input[type="date"]:focus,
form input[type="time"]:focus,
form select:focus,
form textarea:focus {
  border-color: #4CAF50;
}

/* Style for the form submit button */
form button[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

/* Style for the form submit button on hover */
form button[type="submit"]:hover {
  background-color: #45a049;
}

/* Style for the form error message */
form .error {
  color: red;
  margin-top: 5px;
  font-size: 14px;
}
    @media (max-width: 768px) {
      .col-md-6 {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="post" action="process_appointment.php" class="border p-3 rounded">
          <h1 class="mb-3 text-center"><i class="fas fa-calendar-plus"></i> Booking an appointment</h1>
          <p>The patient ID registered recently <b> <?php echo"$name"?> </b>is: <b><?php echo "$patient_id"?></b></p>
          <div class="mb-3">
            <label for="patient_id" class="form-label"><i class="fas fa-id-card"></i> Patient ID:</label>
            <input type="number" name="patient_id" id="patient_id" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="date" class="form-label"><i class="fas fa-calendar-day"></i> Date:</label>
            <input type="date" name="date" id="date" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="time" class="form-label"><i class="fas fa-clock"></i> Time:</label>
            <input type="time" name="time" id="time" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="professional" class="form-label"><i class="fas fa-hospital"></i> Proffesional</label>
            <select name="professional" id="professional" required class="form-select">
              <option value="">Select Professional</option>
              <option value="Cardiologist">Cardiologist</option>
              <option value="Radiologist">Radiologist</option>
              <option value="Dermatologist">Dermatologist</option>
              <option value="Gastroenterologist">Gastroenterologist</option>
              <option value="Neurologist">Neurologist</option>
              <option value="Orthopedic">Orthopedic</option>
              <option value="Pediatric">Pediatric</option>
              <option value="Surgeon">Surgeon</option>
              <option value="Physiotherapist">Physiotherapist</option>

              </select>
          <div class="mb-3">
            <label for="reason" class="form-label"><i class="fas fa-comment-medical"></i> Reason for Appointment:</label>
            <textarea name="reason" id="reason" rows="3" required class="form-control"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-2m8WY5ch5vHVp5CmI/CIZM8hBE+1cuaJ/+fVZdHEkQ2jDlmzOJLv1x0xZWxxTy2C31Nfk9UZKO6UZT6wq3JgWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" integrity="sha512-FgvcWWtB4ax+j4eJ7V10zykOuPG5b5TX00S/PrCUYX9v+q3qlJZmMYhF+RbL15Hz2+e7VJz1mcuVTYR8J0QcmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html> 



<?php
require "database.php";

class User extends Database
{

  public function register()
  {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile_num = $_POST['mobile'];
    $address = $_POST['address'];
    

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql_accounts = "INSERT INTO `accounts` (`username`, `password`) VALUES ('$username','$password')";

    if ($this->conn->query($sql_accounts)) {

      $account_id = $this->conn->insert_id;

      $sql_users = "INSERT INTO  customers(`first_name`,`last_name`,`email`,`mobile_number`,`address`,`account_id`) VALUES('$first_name','$last_name','$email','$mobile_num','$address','$account_id')";
      if ($this->conn->query($sql_users)) {
        header("location: ../views/login.php");
        exit;
      } else {
        echo "<div class='alert alert-danger text-center fw-bold' role='alert'>
                Error in Customer Table: " . $this->conn->error . "</div>";
      }
    } else {
      echo "<div class='alert alert-danger text-center fw-bold' role='alert'>
            Error in ACCOUNTS Table: " . $this->conn->error . "</div>";
    }
  }

  public function login()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect Username or Password</div>";

    $sql = "SELECT * FROM accounts WHERE username = '$username'";

    if ($result = $this->conn->query($sql)) {
      if ($result->num_rows == 1) {
        $user_details = $result->fetch_assoc();
        if (password_verify($password, $user_details['password'])) {
          session_start();
          $_SESSION['account_id'] = $user_details['account_id'];
          $_SESSION['role'] = $user_details['role'];
          $_SESSION['username'] = $user_details['username'];
          $_SESSION['full_name'] = $this->getFullName($user_details['account_id']);

          if ($user_details['role'] == 'A') {
            header("location: ../views/dashboard.php");
          } elseif ($user_details['role'] == 'C') {
            header("location: ../views/home.php");
          }
          exit;
        } else {
          echo $error;
        }
      } else {
        echo $error;
      }
    } else {
      die("Error: " . $this->conn->error);
    }
  }

  public function getFullName($account_id)
  {

    $sql = "SELECT first_name, last_name FROM customers WHERE account_id = $account_id";

    if ($result = $this->conn->query($sql)) {
      $full_name = $result->fetch_assoc();
      return $full_name['first_name'] . " " . $full_name['last_name'];
    } else {
      die("Error: " . $this->conn->error);
    }
  }


  public function displayService()
  {
    $sql_displayallservice = "SELECT services.service_id,services.service_name,services.description,categories.category_name,services.price FROM services INNER JOIN categories ON services.category_id =categories.category_id ORDER BY services.category_id ASC";

    if ($result = $this->conn->query($sql_displayallservice)) {
      return $result;
    } else {
      die("Error retrieving all services" . $this->conn->error);
    }
  }

  public function getUser($account_id)
  {
    $sql_getstaff = "SELECT * FROM customers
     INNER JOIN accounts ON customers.account_id=accounts.account_id WHERE accounts.account_id=$account_id";


    if ($result = $this->conn->query($sql_getstaff)) {
      //   $account_id=$_SESSION['account_id'];
      return $result->fetch_assoc();

    } else {
      die("Error retrieving  user:" . $this->conn->error);
    }

  }

  public function updateUser($customer_id, $first_name, $last_name, $username, $email, $mobile_number, $address, $password, $image_name, $tmp_name)
  {
    $sql_updateuser = "UPDATE `customers`INNER JOIN `accounts`ON customers.account_id=accounts.account_id SET `first_name`='$first_name',`last_name`='$last_name',`username`='$username',`email`='$email',`mobile_number`='$mobile_number' WHERE customer_id=$customer_id";

    if ($this->conn->query($sql_updateuser)) {
      $sql_uploadphoto = "UPDATE customers SET photo ='$image_name' WHERE customer_id=$customer_id";

      if ($this->conn->query($sql_uploadphoto)) {

        $destination = "../assets/images/$image_name";
        move_uploaded_file($tmp_name, $destination);
        header("location: ../views/profile.php");
        exit;
      } else {
        die("Error uploading user:" . $this->conn->error);
      }
    } else {
      die("Error updating staff:" . $this->conn->error);
    }

  }

  public function correctPassword($account_id, $password)
  {
    $sql = "SELECT `password`FROM accounts WHERE account_id=$account_id";

    if ($result = $this->conn->query($sql)) {
      $account = $result->fetch_assoc();

      if (password_verify($password, $account['password'])) {
        return true;
      } else {
        return false;
      }

    }
  }

  public function getServiceinfo()
  {
    $sql_serviceinfo = "SELECT `service_id`,`service_name`,`price` FROM services ORDER BY category_id ASC";

    if ($result = $this->conn->query($sql_serviceinfo)) {

      return $result;

    } else {
      die("Error retrieving service infomation:" . $this->conn->error);
    }

  }

  public function getServiceinfo1()
  {
    $sql_serviceinfo = "SELECT `service_id`,`service_name`,`price` FROM services 
    WHERE category_id=1 ORDER BY `service_id`";

    if ($result = $this->conn->query($sql_serviceinfo)) {

      return $result;

    } else {
      die("Error retrieving service infomation:" . $this->conn->error);
    }

  }

  public function makeAppo($appointment_date, $appointment_time, $service_id, $username, $message, $account_id)
  {
    $service_array = $this->getService($service_id);
    $service_name = $service_array['service_name'];
    $price = $service_array['price'];

    $sql_makeapp = "INSERT INTO `appointments`(`appointment_date`, `appointment_time`,`service_id`,`service_name`,`account_id`, `username`,`message`,`price`) VALUES ('$appointment_date','$appointment_time','$service_id','$service_name','$account_id','$username','$message',$price)";

    if ($this->conn->query($sql_makeapp)) {
      header("location: ../views/make-appo.php");
      exit;
    } else {
      echo "<div class='alert alert-danger text-center fw-bold' role='alert'>
              Error in Appointments Table: " . $this->conn->error . "</div>";
    }

  }

  public function getService($service_id)
  {
    $sql = "SELECT *FROM services WHERE `service_id` = $service_id";

    if ($result = $this->conn->query($sql)) {
      return $result->fetch_assoc();
    } else {
      die("Error retrieving user: " . $this->conn->error);
    }
  }

  public function viewMYappo()
  {
    $sql = "SELECT appointments.appointment_id,services.service_name,services.price,appointments.appointment_date,appointments.appointment_time,appointments.status FROM appointments INNER JOIN services ON services.service_id = appointments.service_id WHERE account_id='" . $_SESSION["account_id"] . "'";

    if ($result = $this->conn->query($sql)) {
      return $result;
    } else {
         die("Error viewing appo: " . $this->conn->error);
    }
  }

  public function getAppoforcancel($appointment_id)
  {
    $sql_getappo="SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS `time`,accounts.username AS `name`,services.service_name AS `service` FROM appointments INNER JOIN accounts ON accounts.account_id=appointments.account_id INNER JOIN services ON services.service_id=appointments.service_id WHERE appointment_id=$appointment_id";

    if ($result = $this->conn->query($sql_getappo)) {
      return $result->fetch_assoc();
    } else {
         die("Error viewing appo: " . $this->conn->error);
    }
  }

  public function sendCancelrequest($appointment_id,$status)
  {
    $sql_cancel="UPDATE appointments SET `status`='$status'WHERE appointment_id=$appointment_id";
    if ($this->conn->query($sql_cancel)) {
      header("location: ../views/view-myappo.php");
      exit;
    } else {
      die("Error sending cancel request:" . $this->conn->error);
    }
  }

  

  

}




?>
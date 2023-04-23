<?php

require "database.php";

class Admin extends Database
{

  //**category**//
  public function createCategory($category_name)
  {
    $sql_category = "INSERT INTO categories (`category_name`) VALUES ('$category_name')";

    if ($this->conn->query($sql_category)) {
      header("location: ../views/categories.php");
    } else {
      die("Error creating category" . $this->conn->error);
    }

  }

  public function getallCategory()
  {
    $sql_allcategory = "SELECT * FROM categories";

    if ($result = $this->conn->query($sql_allcategory)) {
      return $result;
    } else {
      die("Error getting all categories" . $this->conn->error);
    }
  }

  public function getCategory($category_id)
  {
    $sql_category = "SELECT *FROM categories WHERE category_id=$category_id";

    if ($result = $this->conn->query($sql_category)) {
      return $result;
    } else {
      die("Error getting all categories" . $this->conn->error);
    }
  }

  public function updateCategory($category_id, $category_name)
  {

    $sql_updatecategory = "UPDATE categories SET `category_name`='$category_name' WHERE category_id=$category_id";

    if ($this->conn->query($sql_updatecategory)) {
      header("location: ../views/categories.php");
      exit;
    } else {
      die("Error updating  category:" . $this->conn->error);
    }

  }

  //**service**//
  function createService($service_name, $description, $price, $category_id)
  {

    $sql_createservice = "INSERT INTO services (`service_name`,`description`,`price`,`category_id`) VALUES ('$service_name','$description','$price','$category_id')";

    if ($this->conn->query($sql_createservice)) {
      header("location: ../views/services.php");
      exit;
    } else {
      die("Error adding new service " . $this->conn->error);
    }
  }

  public function displayAllservices()
  {

    $sql_displayallservices = "SELECT services.service_id,services.service_name,services.description,categories.category_name,services.price FROM services INNER JOIN categories ON services.category_id =categories.category_id ORDER BY services.category_id ASC";

    if ($result = $this->conn->query($sql_displayallservices)) {
      return $result;
    } else {
      die("Error retrieving all services" . $this->conn->error);
    }

  }

  public function getService($service_id)
  {
    $sql_getservice = "SELECT *FROM  services WHERE `service_id` =$service_id";

    if ($result = $this->conn->query($sql_getservice)) {

      return $result->fetch_assoc();

    } else {
      die("Error retrieving  services:" . $this->conn->error);
    }
  }


  public function updateService($service_id, $service_name, $description, $price, $category_name)
  {
    $sql_updateservice = "UPDATE services SET `service_name` ='$service_name', `description`='$description', `price`='$price' WHERE `service_id`='$service_id'";

    if ($this->conn->query($sql_updateservice)) {

      header("location: ../views/services.php");
      exit;

    } else {
      die("Error retrieving  user:" . $this->conn->error);
    }

  }

  //**staff *//
  public function registerStaff()
  {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $employment_status = $_POST['employment_status'];
    $civil_status = $_POST['civil_status'];
    $position = $_POST['position'];
    $bio = $_POST['bio'];
    // $passwordconf = $_POST['passwordconf'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql_accounts = "INSERT INTO `accounts` (`username`, `password`) VALUES ('$username', '$password')";

    if ($this->conn->query($sql_accounts)) {
      $account_id = $this->conn->insert_id;

      $sql_staff = "INSERT INTO  staff(`first_name`,`last_name`,`position`,`employment_status`,`civil_status`,`bio`,`account_id`) VALUES('$first_name','$last_name','$position','$employment_status','$civil_status','$bio','$account_id')";

      if ($this->conn->query($sql_staff)) {
        header("location: ../views/staff.php");
        exit;
      } else {
        echo "<div class='alert alert-danger text-center fw-bold' role='alert'>
      Error in Staff Table: " . $this->conn->error . "</div>";
      }
    } else {
      echo "<div class='alert alert-danger text-center fw-bold' role='alert'>
      Error in ACCOUNTS Table: " . $this->conn->error . "</div>";
    }

  }

  public function displayStafflist()
  {
    $sql_displayallstaff = "SELECT `staff_id`,`first_name`,`last_name`,`position`,`photo`,`bio` FROM staff ORDER BY staff_id ASC";

    if ($result = $this->conn->query($sql_displayallstaff)) {
      return $result;
    } else {
      die("Error displaying staff list" . $this->conn->error);
    }

  }


  public function getStaff($staff_id)
  {

    $sql_getstaff = "SELECT staff.staff_id,staff.first_name,staff.last_name,accounts.username,staff.photo,staff.bio,staff.position,staff.employment_status,staff.civil_status,accounts.password FROM staff INNER JOIN accounts ON staff.account_id=accounts.account_id WHERE staff_id=$staff_id";

    if ($result = $this->conn->query($sql_getstaff)) {

      return $result->fetch_assoc();

    } else {
      die("Error retrieving  staff:" . $this->conn->error);
    }

  }

  public function updateStaff($staff_id, $first_name, $last_name, $username, $position, $employment_status, $civil_status, $bio, $image_name, $tmp_name)
  {
    $sql_updatestaff = "UPDATE `staff`INNER JOIN `accounts`ON staff.account_id=accounts.account_id SET `first_name`='$first_name',`last_name`='$last_name',`username`='$username',`position`='$position',`employment_status`='$employment_status',`civil_status`='$civil_status',`bio`='$bio' WHERE staff_id=$staff_id";

    if ($this->conn->query($sql_updatestaff)) {
      $sql_uploadphoto = "UPDATE staff SET photo ='$image_name' WHERE staff_id=$staff_id";

      if ($this->conn->query($sql_uploadphoto)) {

        $destination = "../assets/images/$image_name";
        move_uploaded_file($tmp_name, $destination);
        header("location: ../views/staff.php");
        exit;

      } else {
        die("Error uploading staff:" . $this->conn->error);
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

  //**customer *//
  public function displayAllcustomer()
  {
    $sql_displaycus = "SELECT customers.customer_id,customers.first_name,customers.last_name,accounts .username,customers.email,customers.mobile_number,customers.address,customers.photo FROM customers INNER JOIN accounts ON accounts.account_id=customers.account_id WHERE accounts.role='C'";

    if ($result = $this->conn->query($sql_displaycus)) {
      return $result;
    } else {
      die("Error retrieving all services" . $this->conn->error);
    }
  }

  //count for dashbord icon//

  public function countCustomer()
  {
    $sql_count = "SELECT COUNT(customer_id) AS cus FROM customers";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of customer:" . $this->conn->error);
    }

  }

  public function countService()
  {
    $sql_count = "SELECT COUNT(service_id) AS `service` FROM services";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of service:" . $this->conn->error);
    }

  }

  public function countStaff()
  {
    $sql_count = "SELECT COUNT(staff_id) AS `staff` FROM staff";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of service:" . $this->conn->error);
    }

  }

  public function countTotalappo()
  {
    $sql_count = "SELECT COUNT(appointment_id) AS `appo` FROM appointments WHERE 'status'<>'Cancel'";
    if ($result = $this->conn->query($sql_count)) {

      return $result;


    } else {
      die("Error retrieving  the number of total appo:" . $this->conn->error);
    }

  }

  public function countCategory()
  {
    $sql_count = "SELECT COUNT(category_id) AS `category` FROM categories";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of category:" . $this->conn->error);
    }

  }

  //**appointment *//
  public function appoSummery() //**for dashboard*//
  {
    $sql_apposummery = "SELECT appointments.appointment_id,appointments.service_name,appointments.appointment_date,appointments.status FROM appointments INNER JOIN services ON appointments.service_id=services.service_id WHERE `status`='Pending' ORDER BY appointment_date ASC";

    if ($result = $this->conn->query($sql_apposummery)) {
      return $result;
    } else {
      die("Error retrieving apposummery" . $this->conn->error);
    }

  }

  public function viewAppo($appointment_id)
  {
    $sql="SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS `time`,appointments.status AS `status`,accounts.username AS username, accounts.account_id AS account_id,appointments.message AS `message`,services.service_name AS `service_name`, services.price AS price,customers.first_name AS `first_name`,customers.last_name AS `last_name` FROM `appointments` INNER JOIN accounts ON appointments.account_id = accounts.account_id INNER JOIN services ON appointments.service_id=services.service_id INNER JOIN customers ON appointments.account_id=customers.account_id WHERE appointment_id=$appointment_id";

    if ($result = $this->conn->query($sql)) {
      return $result->fetch_assoc();
    } else {
      die("Error displaying confirmd appo " . $this->conn->error);
    }
  }

  public function showCancelrequest()
  {
    $sql = "SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS `time`,accounts.username AS `name`,services.service_name AS `service`,appointments.status AS `status` FROM appointments INNER JOIN accounts ON accounts.account_id=appointments.account_id INNER JOIN services ON services.service_id=appointments.service_id WHERE `status`='Cancel'";

    if ($result = $this->conn->query($sql)) {
      return $result;
    } else {
      die("Error viewing cancel request: " . $this->conn->error);
    }
  }

  public function displayPendingappo()
  {
    $sql_displayappo = "SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS time,appointments.status AS status,appointments.staff_id AS staff_id,appointments.message AS `message`,accounts.username AS username, services.service_name AS `service_name`, services.price AS price FROM `appointments` INNER JOIN accounts ON appointments.account_id = accounts.account_id INNER JOIN services ON appointments.service_id=services.service_id WHERE appointments.status='Pending' ORDER BY appointment_date ASC";

    if ($result = $this->conn->query($sql_displayappo)) {
      return $result;
    } else {
      die("Error displaying pending appo " . $this->conn->error);
    }
  }

  public function displayConfirmappo()
  {
    $sql_displayappo="SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS `time`,appointments.status AS `status`,appointments.staff_id AS staff_id,accounts.username AS username, services.service_name AS `service_name`, services.price AS price,staff.first_name AS `first_name`,staff.last_name AS `last_name` FROM `appointments` INNER JOIN accounts ON appointments.account_id = accounts.account_id INNER JOIN services ON appointments.service_id=services.service_id INNER JOIN staff ON appointments.staff_id=staff.staff_id
    WHERE `status`='Confirm' AND appointment_date > current_date ORDER BY appointment_date ASC";

    if ($result = $this->conn->query($sql_displayappo)) {
      return $result;
    } else {
      die("Error displaying confirmd appo " . $this->conn->error);
    }
  }

  public function displayTodayappo()
  {
    $sql_displayappo ="SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS `time`,appointments.status AS `status`,appointments.staff_id AS staff_id,accounts.username AS username, services.service_name AS `service_name`, services.price AS price,staff.first_name AS `first_name`,staff.last_name AS `last_name` FROM `appointments` INNER JOIN accounts ON appointments.account_id = accounts.account_id INNER JOIN services ON appointments.service_id=services.service_id INNER JOIN staff ON appointments.staff_id=staff.staff_id WHERE appointment_date=current_date AND `status`='Confirm' ORDER BY appointment_time ASC";

    if ($result = $this->conn->query($sql_displayappo)) {
      return $result;
    } else {
      die("Error displaying today's appo " . $this->conn->error);
    }
  }

  public function displayDoneappo()
  {

    $sql_displayappo = "SELECT appointments.appointment_id AS id,appointments.appointment_date AS `date`,appointments.appointment_time AS `time`,appointments.status AS `status`,appointments.staff_id AS staff_id,accounts.username AS username, services.service_name AS `service_name`, services.price AS price,staff.first_name AS `first_name`,staff.last_name AS `last_name` FROM `appointments` INNER JOIN accounts ON appointments.account_id = accounts.account_id INNER JOIN services ON appointments.service_id=services.service_id INNER JOIN staff ON appointments.staff_id=staff.staff_id  WHERE appointment_date<current_date AND `status`='Done' ORDER BY appointment_date DESC"; 

    if ($result = $this->conn->query($sql_displayappo)) {
      return $result;
    } else {
      die("Error displaying done appo " . $this->conn->error);
    }
  }

  public function getAppo($appointment_id)
  {
    $sql_getappo = "SELECT `appointment_id`,`status`,`staff_id`FROM appointments WHERE appointment_id=$appointment_id";

    if ($result = $this->conn->query($sql_getappo)) {

      return $result->fetch_assoc();

    } else {
      die("Error retrieving  services:" . $this->conn->error);
    }

  }

  public function getAllstaffname() //for appo-manage//
  {
    $sql_allstaff = "SELECT accounts.account_id,staff.first_name,staff.last_name,staff.staff_id FROM `staff` INNER JOIN accounts ON staff.account_id=accounts.account_id";

    if ($result = $this->conn->query($sql_allstaff)) {

      return $result;

    } else {
      die("Error retrieving  staffname:" . $this->conn->error);
    }

  }
  public function upDateappo($appointment_id, $status, $staff_id)
  {
    $sql_updateapoo = "UPDATE appointments SET`status`='$status',staff_id='$staff_id'WHERE appointment_id='$appointment_id'";

    if ($this->conn->query($sql_updateapoo)) {
      header("location: ../views/appo-manage.php");
      exit;
    } else {
      die("Error updating  appo:" . $this->conn->error);
    }

  }

  public function countPending()
  {
    $sql_count = "SELECT COUNT(appointment_id) AS pending FROM `appointments` WHERE `status`='Pending'";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of pending:" . $this->conn->error);
    }

  }

  public function countConfirm()
  {
    $sql_count = "SELECT COUNT(appointment_id) AS confirm FROM `appointments` WHERE `status`='Confirm'";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of confirm:" . $this->conn->error);
    }

  }

  public function countToday()
  {
    $sql_count = "SELECT COUNT(appointment_id) AS today FROM `appointments` WHERE `status`='Confirm' AND appointment_date=current_date";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of today'appo:" . $this->conn->error);
    }

  }

  public function countDone()
  {
    $sql_count = "SELECT COUNT(appointment_id) AS done FROM `appointments` WHERE `status`='Done'";
    if ($result = $this->conn->query($sql_count)) {

      return $result;

    } else {
      die("Error retrieving  the number of today'appo:" . $this->conn->error);
    }

  }

  public function getStafffisrstname()
  {
    $sql_displaysaff = "SELECT first_name FROM staff";

    if ($result = $this->conn->query($sql_displaysaff)) {

      return $result;

    } else {
      die("Error retrieving  the number of today'appo:" . $this->conn->error);
    }
  }

  public function deleteAppo($appointment_id){
    
    $sql ="DELETE FROM appointments WHERE `appointment_id` =$appointment_id";

    if($this->conn->query($sql)){
       
        
      header("location: ../views/dashboard.php");
        exit;                           
    } else {
        die("Error creating user: " . $this->conn->error);
    }

}

  //*for salary calculation//
  public function displayStaffdata()
  {
    $sql_staffdata = "SELECT accounts.account_id,staff.staff_id,accounts.username,staff.first_name,staff.last_name,staff.position,staff.civil_status,employment_status FROM staff INNER JOIN accounts ON accounts.account_id=staff.account_id";

    if ($result = $this->conn->query($sql_staffdata)) {

      return $result;
    } else {
      die("Error gettting staff data:" . $this->conn->error);
    }

  }

  public function getData($staff_id)
  {
    $sql_getdata = "SELECT accounts.account_id,staff.staff_id,accounts.username,staff.position,staff.civil_status,staff.employment_status FROM staff INNER JOIN accounts ON accounts.account_id=staff.account_id WHERE staff_id='$staff_id'";


    if ($result = $this->conn->query($sql_getdata)) {
      return $result->fetch_assoc();


    } else {
      die("Error getting sdata:" . $this->conn->error);
    }

  }

  public function getDatastaff($account_id)

  {
    $sql="SELECT *FROM staff WHERE account_id=$account_id";
    // $sql= "SELECT accounts.account_id,staff.staff_id,accounts.username,staff.position,staff.civil_status,staff.employment_status FROM staff INNER JOIN accounts ON accounts.account_id=staff.account_id WHERE accounts.account_id='$account_id'";


    if ($result = $this->conn->query($sql)) {
      return $result->fetch_assoc();


    } else {
      die("Error getting sdata:" . $this->conn->error);
    }

  }
  
  
public function getGrossincome($account_id,$regular_hour,$over_time)
{
  $staff_data=$this->getDatastaff($account_id); 
  // print_r($staff_data['employment_status']);
  //  die($account_id);
  if ($staff_data['position'] == "Master") {
    if ($staff_data['employment_status'] == "Full_Time") {
    $gross_income = $regular_hour * 30 + $over_time * 37;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Part_Time") {
    $gross_income = $regular_hour * 25 + $over_time * 31;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Contractual") {
    $gross_income = $regular_hour * 19 + $over_time * 23;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Probational") {
    $gross_income = $regular_hour * 16 + $over_time * 22;
    return $gross_income;
}

} elseif ($staff_data['position'] == "Expert") {
if ($staff_data['employment_status'] == "Full_Time") {
    $gross_income = $regular_hour * 25 + $over_time * 31;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Part_Time") {
    $gross_income = $regular_hour * 20 + $over_time * 25;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Contractual") {
    $gross_income = $regular_hour * 15 + $over_time * 18;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Probational") {
    $gross_income = $regular_hour * 10 + $over_time * 12;
    return $gross_income;
}

} elseif ($staff_data['position'] == "Staff") {
if ($staff_data['employment_status'] == "Full_Time") {
    $gross_income = $regular_hour * 18 + $over_time * 22;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Part_Time") {
    $gross_income = $regular_hour * 14 + $over_time * 17;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Contractual") {
    $gross_income = $regular_hour * 12 + $over_time * 15;
    return $gross_income;
} elseif ($staff_data['employment_status'] == "Probational") {
    $gross_income = $regular_hour * 8 +$over_time * 10;
    return $gross_income;
}
}

}

public function getNetincome($account_id,$regular_hour, $over_time)
{
  // $staff_info=$this->displayStaffdata();
  $staff_data=$this->getDatastaff($account_id);
  

if ($staff_data['civil_status'] == "Married") {
    if ($this->getGrossincome($account_id,$regular_hour,$over_time) > 1600) {
        $tax =  $this->getGrossincome($account_id,$regular_hour,$over_time) * 0.02;
        $net_income = ($this->getGrossincome($account_id,$regular_hour,$over_time)-$tax)-200;
        return $net_income;
    } else {
        $net_income=$this->getGrossincome($account_id,$regular_hour,$over_time)-200;
        return $net_income;
    }

}elseif($staff_data['civil_status'] == "Single") {
    if ($this->getGrossincome($account_id,$regular_hour,$over_time) > 1000) {
        $tax =  $this->getGrossincome($account_id,$regular_hour,$over_time) * 0.04;
        $net_income = ($this->getGrossincome($account_id,$regular_hour,$over_time)-$tax)-200;
        return $net_income;
    } else {
        $net_income=$this->getGrossincome($account_id,$regular_hour,$over_time)-200;
        return $net_income;
    }
}
}


  public function getSalary($regular_hour,$over_time,$month,$account_id)
  {
    
    $gross_income=$this->getGrossincome($account_id,$regular_hour,$over_time); 
    echo $gross_income;
    $net_income=$this->getNetincome($account_id,$regular_hour,$over_time); 
    echo "<br>" .$net_income;
    "<br>";
  
    // $net_income=$this->getNetincome();
    // $staff_info=$this->displayStaffdata();
    // $staff_data=$staff_info->fetch_assoc();
    //  $staff_id=$staff_data['staff_id'];
    // $staff_array=$this->getData($staff_id);
    // // $account_id=$staff_array($account_id);
    
    $sql_salary = "INSERT INTO `staff_salary`(`regular_hour`, `over_time`, `net_income`, `gross_income`, `month`, `account_id`) VALUES ('$regular_hour','$over_time','$net_income','$gross_income','$month',
    '$account_id')";

  
    if ($this->conn->query($sql_salary)) {
      header("location: ../views/salary.php");
      exit;
    } else {
      die("Error calculate salary " . $this->conn->error);
    }

  }

  public function staffDatahome()
  {
    $sql="SELECT * FROM staff";

    if($result=$this->conn->query($sql)){
      return $result;
    }else {
      die("Error getting sdata:" . $this->conn->error);
  }
}

public function getSalaryinfo()
  {
    $sql="SELECT staff_salary.salary_id,staff_salary.month,staff.first_name,staff.last_name,staff.position,staff.employment_status,staff.civil_status,staff_salary.gross_income,staff_salary.net_income FROM staff INNER JOIN staff_salary ON staff.account_id=staff_salary.account_id ORDER BY salary_id ASC";

    if ($result = $this->conn->query($sql)) {
      return $result;


    } else {
      die("Error getting sdata:" . $this->conn->error);
    }


  }

public function viewSalarydetail($salary_id)
{
  $sql_salarydetail="SELECT staff_salary.account_id,staff_salary.salary_id,staff_salary.month,staff.first_name,staff.last_name,staff.position,staff.employment_status,staff.civil_status,staff_salary.gross_income,staff_salary.net_income,staff_salary.regular_hour,staff_salary.over_time FROM staff INNER JOIN staff_salary ON staff.account_id=staff_salary.account_id WHERE salary_id=$salary_id";

  if ($result = $this->conn->query($sql_salarydetail)) {
    return $result->fetch_assoc();


  } else {
    die("Error getting sdata:" . $this->conn->error);
  } 
}

public function editWorkinghour($salary_id,$regular_hour,$over_time,$gross_income,$net_income,$account_id)
{

  $gross_income=$this->getGrossincome($account_id,$regular_hour,$over_time);
  $net_income=$this->getNetincome($account_id,$regular_hour,$over_time);

  $sql="UPDATE `staff_salary` SET `regular_hour`='$regular_hour',`over_time`='$over_time', `gross_income`='$gross_income',`net_income`='$net_income'WHERE salary_id=$salary_id";

  if ($this->conn->query($sql)) {

    header("location: ../views/view-salary-calculation.php?salary_id=$salary_id");
    exit;

  } else {
    die("Error editing workng hour:" . $this->conn->error);
  }


}

}

?>
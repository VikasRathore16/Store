<?php
namespace App;
class User extends DB
{
    public string $username;
    public string $firstName;
    public string $lastName;
    public string $password;
    public string $email;

    public function __construct(
        $username,
        $firstName,
        $lastName,
        $email,
        $password
    ) {
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->email = $email;
    }

    public function addUser()
    {
        DB::getInstance()->exec(
            "INSERT INTO Users (username, firstName, lastName, email, password)  VALUES ('$this->username', '$this->firstName' ,'$this->lastName','$this->email','$this->password')"
        );
    }

    public function deleteUser($userId)
    {
        $sql = DB::getInstance()->prepare(
            "Delete from Users where userId = '$userId'"
        );
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        return 'delete';
    }

    public function updateDetails($userId,$address,$state,$country,$pincode)
    {
      DB::getInstance()->exec(
        "UPDATE Users SET  address = '$address', state= '$state' , country = '$country' , pincode='$pincode' where userId='$userId'"
    );
    return 1;
    }
    public function ApproveUser($userId)
    {
        $sql = "UPDATE Users SET status =? where userId = '$userId'";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute(['Approved']);
        return $userId;
    }

    public function RestrictUser($userId)
    {
        DB::getInstance()->exec(
            "UPDATE Users SET status = 'Restricted' where userId = '$userId'"
        );
        return $userId;
    }

    public function getUser($email, $password)
    {
        $sql = DB::getInstance()->prepare(
            "Select * from Users where email ='$email' and password = '$password' "
        );
        $sql->execute();
        $result = $sql->setFetchMode(\PDO::FETCH_ASSOC);
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            return $v;
        }
    }

    public function getAllUser()
    {
        $sql = DB::getInstance()->prepare('Select * from Users');
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $html = "<div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th scope='col'>User ID</th>
              <th scope='col'>User Name</th>
              
              <th scope='col'>First Name</th>
              <th scope='col'>Last Name</th>
              <th scope='col'>Email</th>
              <th scope='col'>Role</th>
              <th scope='col'>Address</th>
              <th scope='col'>Pincode</th>
              <th scope='col'>Status</th>
              <th scope='col'>Action</th>
            </tr>
          </thead>
          <tbody>";
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            // print_r($v);
            $html .= "<tr id='$v[userId]'>
            <td>$v[userId]</td>
            <td>$v[username]</td>
            <td>$v[firstName]</td>
            <td>$v[lastName]</td>
            <td>$v[email]</td>
            <td>$v[role]</td>
            <td>$v[address]</td>
            <td>$v[pincode]</td>
            <td>$v[status]</td>
            <td><button class='border-0 btn' name='userId' value='$v[userId]' id='edit' data-userid ='$v[userId]' >Edit </button>
            <button class='border-0 btn' name='userId' value='$v[userId]' id='delete' data-userid ='$v[userId]'>Delete</button> ";
            if ($v['status'] == 'Restricted') {
                $html .= "<button class='border-0 btn text-light ps-3 pe-3' name='userId' value='$v[userId]' style='background-color:deepskyblue;'  id='status$v[userId]' data-sta data-status='$v[status]' data-userid ='$v[userId]'>Approve</button> </td>
          </tr>";
            } else {
                $html .= "<button class='border-0 btn  text-light ps-3 pe-3' name='userId' style='background-color:tomato;'  value='$v[userId]' id='status$v[userId]' data-status='$v[status]' data-userid ='$v[userId]'>Restrict</button> </td>";
            }
        }

        $html .= "</tr>
        </tbody>
      </table>
    </div>";
        return $html;
    }

    public function checkUser($email)
    {
        $sql = DB::getInstance()->prepare(
            "Select * from Users where email = '$email' "
        );
        $sql->execute();
        $result = $sql->setFetchMode(\PDO::FETCH_ASSOC);

        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            return $v;
        }
    }
}

<?php
class ACL
{
    var $perms = array();        //Array : Stores the permissions for the user 
    var $userID = 0;            //Integer : Stores the ID of the current user 
    var $userRoles = array();    //Array : Stores the roles of the current user 
    
    function __constructor($userID = '')
    {
        if ($userID != '')
        {
            $this->userID = floatval($userID);
        } else {
            $this->userID = floatval($_SESSION['ID']);
        }
        $this->userRoles = $this->getUserRoles();
        $this->buildACL();
    }
    function ACL($userID='')
	{
		$this->__constructor($userID);
	}
    function getUserRoles()
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $query = "SELECT * FROM `user_role` WHERE `ID` = " . floatval($this->userID) . " ORDER BY `addDate` ASC";
        $data = mysqli_query($conn, $query);
        $resp = array();
        while($row = mysqli_fetch_array($data))
        {
            $resp[] = $row['role_ID'];
        }
        return $resp;
    }
    function getAllRoles($format='role_ID')
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $format = strtolower($format);
        $query = "SELECT * FROM `roles` ORDER BY `role_name` ASC";
        $data = mysqli_query($conn, $query);
        $resp = array();
        while($row = mysqli_fetch_array($data))
        {
            if ($format == 'full')
            {
                $resp[] = array("ID" => $row['role_ID'],"Name" => $row['role_name']);
            } else {
                $resp[] = $row['ID'];
            }
        }
        return $resp;
    }
    function buildACL()
    {
        //first, get the rules for the user's role 
        if (count($this->userRoles) > 0)
        {
            $this->perms = array_merge($this->perms,$this->getRolePerms($this->userRoles));
        }
        //then, get the individual user permissions 
        $this->perms = array_merge($this->perms,$this->getUserPerms($this->userID));
    }
    function getPermKeyFromID($permission_ID)
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $query = "SELECT `permKey` FROM `permissions` WHERE `ID` = " . floatval($permission_ID) . " LIMIT 1";
        $data = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }
    function getPermNameFromID($permission_ID)
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $query = "SELECT `permission_desc` FROM `permissions` WHERE `ID` = " . floatval($permission_ID) . " LIMIT 1";
        $data = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }
    function getRoleNameFromID($role_ID)
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $query = "SELECT `role_name` FROM `roles` WHERE `ID` = " . floatval($role_ID) . " LIMIT 1";
        $data = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }
    function getUsername($ID)
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $query = "SELECT `username` FROM `users` WHERE `ID` = " . floatval($ID) . " LIMIT 1";
        $data = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }
    function getRolePerms($role)
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        if (is_array($role))
        {
            $query = "SELECT * FROM `role_perm` WHERE `role_ID` IN (" . implode(",",$role) . ") ORDER BY `ID` ASC";
        } else {
            $query = "SELECT * FROM `role_perm` WHERE `role_ID` = " . floatval($role) . " ORDER BY `ID` ASC";
        }
        $data = mysqli_query($conn, $query);
        $perms = array();
        while($row = mysqli_fetch_assoc($data))
        {
            $pK = strtolower($this->getPermKeyFromID($row['permission_ID']));
            if ($pK == '') { continue; }
            if ($row['value'] === '1') {
                $hP = true;
            } else {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK,'inheritted' => true,'value' => $hP,'Name' => $this->getPermNameFromID($row['permission_ID']),'ID' => $row['permission_ID']);
        }
        return $perms;
    }
    
    function getUserPerms($userID)
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $query = "SELECT * FROM `user_perm` WHERE `user_ID` = " . floatval($userID) . " ORDER BY `addDate` ASC";
        $data = mysqli_query($conn, $query);
        $perms = array();
        while($row = mysqli_fetch_assoc($data))
        {
            $pK = strtolower($this->getPermKeyFromID($row['permission_ID']));
            if ($pK == '') { continue; }
            if ($row['value'] == '1') {
                $hP = true;
            } else {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK,'inheritted' => false,'value' => $hP,'Name' => $this->getPermNameFromID($row['permission_ID']),'ID' => $row['permission_ID']);
        }
        return $perms;
    }
    function getAllPerms($format='ID')
    {
        $conn = mysqli_connect('localhost','root','','demo1');
        $format = strtolower($format);
        $query = "SELECT * FROM `permissions` ORDER BY `permission_desc` ASC";
        $data = mysqli_query($conn, $query);
        $resp = array();
        while($row = mysqli_fetch_assoc($data))
        {
            if ($format == 'full')
            {
                $resp[$row['permKey']] = array('ID' => $row['ID'], 'Name' => $row['permission_desc'], 'Key' => $row['permission_desc']);
            } else {
                $resp[] = $row['ID'];
            }
        }
        return $resp;
    }
    function userHasRole($roleID)
    {
        foreach($this->userRoles as $k => $v)
        {
            if (floatval($v) === floatval($roleID))
            {
                return true;
            }
        }
        return false;
    }
    
    function hasPermission($permKey)
    {
        $permKey = strtolower($permKey);
        if (array_key_exists($permKey,$this->perms))
        {
            if ($this->perms[$permKey]['value'] === '1' || $this->perms[$permKey]['value'] === true)
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
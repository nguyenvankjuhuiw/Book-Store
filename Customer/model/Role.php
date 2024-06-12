<?php

class Role {
    private $roleid;
    private $rolename;

    public function __construct($row) {
        $this->roleid = $row['roleid'];
        $this->rolename = $row['rolename'];
    }

    // Getter methods
    public function getRoleId() {
        return $this->roleid;
    }

    public function getRoleName() {
        return $this->rolename;
    }

    // Setter methods
    public function setRoleId($roleid) {
        $this->roleid = $roleid;
    }

    public function setRoleName($rolename) {
        $this->rolename = $rolename;
    }
}

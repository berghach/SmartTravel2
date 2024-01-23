<?php 
class user{
  
    private $id;
    private $name;
    private $email ;
    private $password;
    private $role;
    private $is_active;
    private $date_register;
   



    public function __construct($id, $name,$email , $password , $role,$is_active ,$date_register){
     
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->is_active = $is_active;
        $this->date_register = $date_register;

    }
    



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of password
     */ 
    public function getpassword()
    {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the value of is_active
     */ 
    public function getis_active()
    {
        return $this->is_active;
    }

    /**
     * Get the value of date_register
     */ 
    public function getDate_register()
    {
        return $this->date_register;
    }
    

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }


}


?>
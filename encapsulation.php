
<?php
class Employees{
    private $emp_id;
    private $emp_department;
    private $emp_name;
    private $emp_sallery=0;
    public function __construct($emp_id,$emp_department,$emp_name){
             $this->emp_id = $emp_id;
             $this->emp_department = $emp_department;
             $this->emp_name = $emp_name;
    }
    public function getSallery(){
       return $this->emp_sallery;
    }
    public function setsallery($new_sallery){
        if($new_sallery>0){
            $this->emp_sallery = $new_sallery;
        }else{
            echo "sallery can not be negetive";
        }
    }
    public function displayinfo(){
        echo "Employee_Id = ".$this->emp_id."<br>";
        echo "Employee_name=".$this->emp_name."<br>";
        echo "Employee_Department = ".$this->emp_department."<br>";
        echo "Salary: TK" . number_format($this->getSallery(), 2) . "<br>";
    }
}
$emp1 = new Employees(1,"CSE","Niloy");
$emp1->setsallery(5000);
$emp1->displayinfo();
?>
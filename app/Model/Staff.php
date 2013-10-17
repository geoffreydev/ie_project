<?php
	class Staff extends AppModel
    {
        public $useTable = false;
        public $name = "Staff";
        public $staff = "Users";
        public $belongsTo = array('User' => array('className'=> 'User'));


    public function confirmPhone() {
            $value=false;
        if ($this->data['Staff']['mobile_phone']!=''){
            $value=true;
        }
        return $value;
    }

    public function validatePhone() {
        $value=true;
        if ($this->data['Staff']['mobile_phone']!='' && strlen($this->data['Staff']['mobile_phone'])!=10){
            $value=false;
        }
        if ($this->data['Staff']['landline_phone']!='' && strlen($this->data['Staff']['landline_phone'])!=10){
            $value=false;
        }
        return $value;
    }

        public function StaffValidate() {
            $validate1 = array(
                'first_name'=> array(
                    'mustNotEmpty'=>array(
                        'rule' => 'notEmpty',
                        'message'=> 'Please enter first name')
                ),
                'landline_phone'=> array(
                    'mustNotEmpty'=>array(
                        'rule' => 'confirmPhone',
                        'message'=> ''),
                    'validphone'=>array(
                        'rule' => 'validatePhone',
                        'message'=> '')
                ),
                'last_name'=>array(
                    'mustNotEmpty'=>array(
                        'rule' => 'notEmpty',
                        'message'=> 'Please enter last name')
                )
            );
            $this->validate=$validate1;
            return $this->validates();
        }

}
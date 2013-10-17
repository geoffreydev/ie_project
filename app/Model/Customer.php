<?php
	class Customer extends AppModel
    {
        public $useTable = false;
        public $name = "Customer";
        public $customer = "Users";
        public $belongsTo = array('User' => array('className'=> 'User'));


    public function confirmPhone() {
            $value=false;
        if ($this->data['Customer']['mobile_phone']!=''){
            $value=true;
        }
        if ($this->data['Customer']['landline_phone']!=''){
            $value=true;
        }
        if ($this->data['Customer']['work_phone']!=''){
            $value=true;
        }
        return $value;
    }

    public function validatePhone() {
        $value=true;
        if ($this->data['Customer']['mobile_phone']!='' && strlen($this->data['Customer']['mobile_phone'])!=10){
            $value=false;
        }
        if ($this->data['Customer']['landline_phone']!='' && strlen($this->data['Customer']['landline_phone'])!=10){
            $value=false;
        }
        if ($this->data['Customer']['work_phone']!='' && strlen($this->data['Customer']['work_phone'])!=10){
            $value=false;
        }
        return $value;
    }

        public function CustomerValidate() {
            $validate1 = array(
                'first_name'=> array(
                    'mustNotEmpty'=>array(
                        'rule' => 'notEmpty',
                        'message'=> 'Please enter first name')
                ),
                /*'email'=> array(
                    'mustBeEmail'=> array(
                        'rule' => array('email'),
                        'message' => 'Please enter valid email',
                        'last'=>true)
                ),*/
                'landline_phone'=> array(
                    'mustNotEmpty'=>array(
                        'rule' => 'confirmPhone',
                        'message'=> ''),
                    'validphone'=>array(
                        'rule' => 'validatePhone',
                        'message'=> '')
                ),
                'work_phone'=> array(
                    'mustNotEmpty'=>array(
                        'rule' => 'confirmPhone',
                        'message'=> 'Please enter at least one phone number.'),
                    'validphone'=>array(
                        'rule' => 'validatePhone',
                        'message'=> 'Phone number must be 10 digits.  Include area code')
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
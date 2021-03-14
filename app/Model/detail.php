<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Detail extends AppModel {

    public $name = 'Detail';
    public $useTable = 'details';
    public $primaryKey = 'id';
    public $validate = array(
        'first_name' => array(
            'rule' => 'alphaNumeric',
            'required' => true,
            'message' => 'Only letters and white space allowed'
        ),
        'last_name' => array(
            'rule' => 'alphaNumeric',
            'required' => true,
            'message' => 'Only letters and white space allowed'
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'), //'true' for real email
                'message' => 'Please enter a valid email address.'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This email has already been taken.'
            )
        ),
        'password' => array(
            'rule' => array('minLength', '5'),
            'required' => true,
            'message' => 'Minimum 5 characters required'
        ),
        'gender' => array(
            'rule' => 'notBlank',
            'required' => true,
            'message' => 'Please select gender'
        ),
        'city' => array(
            'rule' => 'alphaNumeric',
            'required' => true,
            'message' => 'Please select your city'
        ),
        'country' => array(
            'rule' => 'notBlank',
            'required' => true,
            'message' => 'Please select your country'
        ),
        'status' => array(
            'rule' => 'notBlank',
            'required' => true,
            'message' => 'Please select your status'
        )
//        ,'agreement' => array(
//            'rule'=> 'notBlank',
//            'message' => 'Please select your status'
//       )
    );

    public function getDataById($id) {
        $params = array(
            'fields' => array(
                'id'
                , 'first_name'
                , 'last_name'
                , 'email'
                , 'password'
                , 'gender'
                , 'city'
                , 'country'
                , 'status'
                , 'agreement'),
            'conditions' => array('id' => $id));
        $listing = $this->find('first', $params);
        return $listing;
    }
/*
 * common function to get data
 */
    public function getData($condition = array()) {
        
        $params = array(
            'fields' => array(
                'id'
                , 'first_name'
                , 'last_name'
                , 'email'
                , 'password'
                , 'gender'
                , 'city'
                , 'country'
                , 'status'
                , 'agreement'),
            'conditions' => $condition
        );
        $listing = $this->find('all', $params);
        return $listing;
    }

//    public function searchData($keyword) {
////        print_r($keyword);die;
//        /*
//         * SELECT `Detail`.`id`, `Detail`.`first_name`, `Detail`.`last_name`, `Detail`.`email`, `Detail`.`password`, `Detail`.`gender`, `Detail`.`city`, `Detail`.`country`, `Detail`.`status`, `Detail`.`agreement` FROM `cakephp`.`details` AS `Detail`   WHERE `first_name` LIKE '%abcd%'
//         */
//        $listing = $this->find('all', array('conditions' => array('first_name LIKE ' => '%' . $keyword . '%'),
//            'fields' => array(
//                'id'
//                , 'first_name'
//                , 'last_name'
//                , 'email'
//                , 'password'
//                , 'gender'
//                , 'city'
//                , 'country'
//                , 'status'
//                , 'agreement')
//        ));
////        $log = $this->getDataSource()->getLog(false, false);
////        debug($log);
////        
////        die;
//
//        return($listing);
//    }
//
//    public function filterStatusData($status) {
//        /*
//         * SELECT `Detail`.`id`, `Detail`.`first_name`, `Detail`.`last_name`, `Detail`.`email`, `Detail`.`password`, `Detail`.`gender`, `Detail`.`city`, `Detail`.`country`, `Detail`.`status`, `Detail`.`agreement` FROM `cakephp`.`details` AS `Detail`   WHERE `status` = 'm'
//         */
//        $listing = $this->find('all', array('conditions' => array('status' => $status),
//            'fields' => array(
//                'id'
//                , 'first_name'
//                , 'last_name'
//                , 'email'
//                , 'password'
//                , 'gender'
//                , 'city'
//                , 'country'
//                , 'status'
//                , 'agreement')
//        ));
////        print_r($listing);
////                $log = $this->getDataSource()->getLog(false, false);
////        debug($log);
////        
////        die;
//
//        return($listing);
//    }

}

?>

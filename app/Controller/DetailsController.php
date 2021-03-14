<?php

/*
 * Name- Akash
 * Date- 8 march 2019
 * Purpose- to create registration page
 */

class DetailsController extends AppController {

    public $use = 'Detail';

    public function registration() {
        if ($this->request->is(array('post', 'put', 'get'))) {
            if(isset($this->data['Detail']) && isset($_GET['id']) && !empty($_GET['id'])) {

                $data['Detail']['id'] = $this->data['update'];
                $data['Detail']['first_name'] = $this->data['Detail']['first_name'];
                $data['Detail']['last_name'] = $this->data['Detail']['last_name'];
                $data['Detail']['email'] = $this->data['Detail']['email'];
                $data['Detail']['password'] = $this->data['Detail']['password'];
                $data['Detail']['gender'] = $this->data['Detail']['gender'];
                $data['Detail']['city'] = $this->data['Detail']['city'];
                $data['Detail']['country'] = $this->data['Detail']['country'];
                $data['Detail']['status'] = $this->data['Detail']['status'];
                $data['Detail']['agreement'] = $this->data['Detail']['agreement'];
                /*
                 * query to update
                 * UPDATE `cakephp`.`details` SET `id` = 8, `first_name` = 'afirst', `last_name` = 'alast', `email` = 'updateaemail@a.com', `password` = 'admin@123', `gender` = 'male', `city` = 'city', `country` = 'India', `status` = 's', `agreement` = 'yes'  WHERE `cakephp`.`details`.`id` = '8'
                 * 
                 */

                $this->Detail->create();
                $this->Detail->save($data);
                $this->Flash->success('Updated Successfully');
                $this->redirect(array("controller" => "details",
                    'action' => 'listing_user'));

                
            } elseif ( isset($_GET['id']) &&!empty($_GET['id']) ) {
                $dataById = $this->Detail->getDataById($_GET['id']);
                $this->set('dataById', $dataById);
            } elseif (isset($this->data['Detail'])) {



                $this->Detail->Create();
                $this->Detail->Save($this->data);
                $this->Flash->success('Saved Successfully');
                $this->redirect(array("controller" => "details",
                    'action' => 'listing_user'));
                
            }
//            $log = $this->Detail->getDataSource()->getLog(false, false);
//            debug($log);
//            die;
        }
        $this->layout = 'custom';
    }

    public function retriveData() {
        /** fetching data from table   
         * 
         * 'SELECT `Detail`.`first_name`, `Detail`.`last_name`, `Detail`.`email`, `Detail`.`password`, `Detail`.`gender`, `Detail`.`city`, `Detail`.`country`, `Detail`.`status`, `Detail`.`agreement` FROM `cakephp`.`details` AS `Detail`   WHERE 1 = 1',
         *
         * 
         * 
         * */
        $params = array(
            'fields' => array(
                'first_name'
                , 'last_name'
                , 'email'
                , 'password'
                , 'gender'
                , 'city'
                , 'country'
                , 'status'
                , 'agreement'),
        );
        $listing = $this->Detail->find('all', $params);
        echo "<pre>";
        print_r($listing);
        die;
//        $log = $this->Detail->getDataSource()->getLog(false, false);
//        debug($log);
//        die;
    }

    public function updateCityToNoida() {
        /*
         * Updating city to noida for all data
         * 'UPDATE `cakephp`.`details` AS `Detail`  SET `Detail`.`city` = 'noida'  WHERE 1 = 1'
         */

        $this->Detail->updateAll(
                array('city' => "'noida'") //for set statement and second array for condition
        );

        $log = $this->Detail->getDataSource()->getLog(false, false);
        debug($log);
        die;
    }

    public function updateMaleToFemale() {
        /*
         * d) Update all males to females
         * 'UPDATE `cakephp`.`details` AS `Detail`  SET `Detail`.`gender` = 'female'  WHERE 1 = 1'
         */
        $this->Detail->updateAll(
                array('gender' => "'female'") //for set statement and second array for condition
        );

        $log = $this->Detail->getDataSource()->getLog(false, false);
        debug($log);
        die();
    }

    public function deleteFirstUser() {
        /*
         * e) delete only first user of the table
         * 'DELETE `Detail` FROM `cakephp`.`details` AS `Detail`   WHERE `Detail`.`id` = 1'
         */
        $id = 1;
        $this->Detail->delete($id);
        $log = $this->Detail->getDataSource()->getLog(false, false);
        debug($log);
        die();
    }

    public function deleteAllUser() {
        /*
         * f) delete all users exists in table
         */
        $this->Detail->deleteAll(array(1 => 1), false);
        $log = $this->Detail->getDataSource()->getLog(false, false);
        debug($log);
        die();
    }

    public function updateFirstName() {
        /*
         * g) update first name for specific user
         * 'UPDATE `cakephp`.`details` AS `Detail`  SET `Detail`.`first_name` = 'abcd'  WHERE `id` = 7'
         */

//        $data['Detail']['id'] = 7;
//        $data['Detail']['first_name'] = "abcd";
//        $this->Detail->create();
//        $this->Detail->save($data);

        $this->Detail->updateAll(
                array('first_name' => "'abcd'"), array('id =' => '7')
        );


        $log = $this->Detail->getDataSource()->getLog(false, false);
        debug($log);
        die();
    }

    /////////////////////////////////////////////////////////////
    /*
     * 
     * Purpose creating function to show all data
     * 
     * 
     */
    ///////////////////////////////////////////////////////////////

    public function listing_user() {

        if (isset($this->data['reset'])) {
            $this->Session->delete('condition');
            $this->Session->delete('status_filter');
            $this->Session->delete('search_box');
        }


        $condition = array();
        if (isset($this->data['submit'])) {
            if (isset($this->data['status_filter']) && !empty($this->data['status_filter'])) {
                $this->set('status_filter', $this->data['status_filter']);
                $condition['status'] = $this->data['status_filter'];
                $this->Session->write('status_filter', $this->data['status_filter']);
            }
            if (isset($this->data['search_box']) && !empty($this->data['search_box'])) {
                $this->set('search_box', $this->data['search_box']);
                $condition['first_name LIKE'] = "%" . $this->data['search_box'] . "%";
                $this->Session->write('search_box', $this->data['search_box']);
            }
            $user_data = $this->Detail->getData($condition);
        } elseif ($this->Session->check('condition')) {
            $condition = $this->Session->read('condition');
            $user_data = $this->Detail->getData($condition);
        } else {
            $user_data = $this->Detail->getData();
        }
//        $this->Session->write('user_data', $user_data);
        $this->Session->write('condition', $condition);
        $this->set('user_data', $user_data);
        $this->set('status_filter', $this->Session->read('status_filter'));
        $this->set('search_box', $this->Session->read('search_box'));
        $this->layout = 'custom';
    }

}

?>
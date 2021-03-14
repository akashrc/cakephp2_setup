<?php

if(isset($dataById)) {
    /*
     * edit case
     */
    
    
    $first_name = $dataById['Detail']['first_name'];
    $last_name = $dataById['Detail']['last_name'];
    $email = $dataById['Detail']['email'];
    $password = $dataById['Detail']['password'];
    $gender= $dataById['Detail']['gender'];
    $city = $dataById['Detail']['city'];
    $country = $dataById['Detail']['country'];
    $status = $dataById['Detail']['status'];
    $agreement = $dataById['Detail']['agreement'];
}else {
    /*
     * registratin case
     */
    $first_name = '';
    $last_name = '';
    $email = '';
    $password = '';
    $gender= 'male';
    $city = '';
    $country ='';
    $status = '';
    $agreement ='Yes';
    
}

echo $this->Form->create('Detail');
?>
<div class="wrapper">
    <h2>Registration Form</h2>

    <?php echo $this->Form->input('first_name', array("type" => "text", "id" => "first_name",'label' => 'First Name',
            'value'=> $first_name,
            'class'=>'form-control',
            'div' => array(
            'class'=>'form-group'))); ?>
    <!-- First Name<br><input type="text" name="data[Detail][first_name]" id="first_name" > -->


    <?php echo $this->Form->input('last_name', array("type" => "text", "id" => "last_name",'label' => 'Last Name',
            'class'=>'form-control',
            'value'=> $last_name,
            'div' => array(
            'class'=>'form-group'))); ?>


    <?php echo $this->Form->input('email', array("type" => "email", "id" => "email",'label' => 'Email',
            'class'=>'form-control',
            'value'=> $email,
            'div' => array(
            'class'=>'form-group'))); ?>


    <?php echo $this->Form->input('password', array("type" => "password", "id" => "password",'label' => 'Password',
            'class'=>'form-control',
            'value'=> $password,
            'div' => array(
            'class'=>'form-group'))); ?>


    <!--  Gender<br>
      <input type="radio" name="data[Detail][gender]" value="male" checked >Male<br>
      <input type="radio" name="data[Detail][gender]" value="female">Female   -->

  <?php $options=array('male'=>'Male','female'=>'Female');
          $attributes = array(
          'value' => $gender,
           'label' => 'Gender',
            'class'=>'form-control',
            'div' => array(
            'class'=>'form-group'
          )); 
          echo $this->Form->radio('gender',$options,$attributes);  
          
//          echo $this->Form->input('agreement', array(
//            'options' => array('Yes'=>'Agree','No'=>'Not agree'),
//            'type' => 'radio',
//            'label' => 'Agreement',
//            'class'=>'form-control',
//            'div' => array(
//            'class'=>'form-group'	
//            )
//         ));
    ?>

    <!--  City<br>
    <input type="text" name="data[Detail][city]" id="city" > -->
    <?php echo $this->Form->input('city', array("type" => "text", "id" => "city",
                                    'value' => $city,
                                    'label' => 'City',
                                     'class'=>'form-control',
                                     'div' => array(
                                     'class'=>'form-group'
                                    ))); ?>


    <!--<select name="data[Detail][country]" >
        <option value="India">India</option>
        <option value="Nepal">Nepal</option>
    </select> -->

    <?php
        
        echo $this->Form->input('country', array(
            'options' => array('India'=>"India", 'Nepal'=>"Nepal"),
            'empty' => '-Select-',
            'label' => 'Country',
            'value' => $country,
            'class'=>'form-control',
            'div' => array(
            'class'=>'form-group'	
            )
         ));
        
    ?>

    <?php       
        echo $this->Form->input('status', array(
            'options' => array('s'=>"Single",'m'=>"Married"),
            'empty' => '-Select-',
            'label' => 'Status',
            'value' => $status,
            'class'=>'form-control',
            'div' => array(
            'class'=>'form-group'	
            )
         ));
    ?>


    <?php 
        echo $this->Form->input('agreement', array(
            'options' => array('yes'=>'Agree','no'=>'Not agree'),
            'type' => 'radio',
            'value'=>$agreement,
            'label' => 'Agreement',
            'class'=>'form-control',
            'div' => array(
            'class'=>'form-group'	
            )
         ));
          
    ?>

<?php   
      if(isset($dataById)) {
          echo $this->form->input('update',array(
              'label'=>'update',
              'value'=>$dataById['Detail']['id'],
              'type'=>'hidden'
          ));
      }
      echo $this->Form->submit();
      echo $this->Form->button('Reset the Form', array('type' => 'reset'));
      echo $this->Form->end(); 
?>
</div>
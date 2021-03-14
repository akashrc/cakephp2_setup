<!--<?php/* echo $this->Form->input('seach', array("type" => "text", "id" => "seach",'label' => 'Search',
            'class'=>'form-control',
            'value' => $search,
            'div' => array(
            'class'=>'form-group')));*/ ?> -->


<!-- code for status based filter-->
<form method='post'>
    <div class="filter">
        <div class="left">
            <input type='text' name='search_box' value ='<?php if(isset($search_box)) { echo $search_box;};?>' placeholder="Search">
        </div>

        <!-- code for status based filter-->
        <div class='middle'>

            <select name='status_filter'>
                <option value='' <?php if(isset($status_filter) && $status_filter==''){ echo 'selected';};?> >Please select status</option>
                <option value='s' <?php if(isset($status_filter) && $status_filter=='s'){ echo 'selected';};?> >Single</option>
                <option value='m' <?php if(isset($status_filter) && $status_filter=='m'){ echo 'selected';};?> >Married</option>
            </select>
            <input type='submit' name='submit' value='Filter'>

        </div>

        <!-- code for reset all filter   style='width: 15%; padding: 0; height: 5%'  -->
        <div class='right'>
            <input type='submit' name='reset' value='Reset all Filter' >
        </div>
    </div>
</form>
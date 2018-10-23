<?php

class MY_Loader extends CI_Loader {

/*function mymodel($model, $folder = '',$vars = array(), $return = FALSE) {

    array_push($this->_ci_model_paths, ""); //replace "" with any other directory
    parent::model($model);
}
*/

function myview($folder, $view, $vars = array(), $return = FALSE) {
        $this->_ci_view_paths = array_merge($this->_ci_view_paths, array(APPPATH . '../' . $folder . '/' => TRUE));
       // return $this->_ci_load(array(
      //          '_ci_view' => $view,
      //          '_ci_vars' => $this->_ci_object_to_array($vars),
      //          '_ci_return' => $return
      //  ));

        if (method_exists($this, '_ci_object_to_array'))
		{
		    return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		} else {
		    return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_prepare_view_vars($vars), '_ci_return' => $return));
		}
}

}
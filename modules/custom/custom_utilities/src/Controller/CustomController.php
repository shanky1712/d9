<?php

namespace Drupal\custom_utilities\Controller;
Use Drupal\Core\Controller\ControllerBase;

class CustomController extends ControllerBase{
	public function createTask() {
	    return array(
	      '#type' => 'markup',
	      '#markup' => t('welcome to our website'),
	    );
	}
}
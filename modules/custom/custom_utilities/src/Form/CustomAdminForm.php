<?php  
/**  
 * @file  
 * Contains Drupal\custom_utilities\Form\CustomAdminForm.  
 */  
namespace Drupal\custom_utilities\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  

class CustomAdminForm extends ConfigFormBase {  
  /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'custom.adminsettings',  
    ];  
  }  

  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'custom_admin_form';  
  }
  /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('custom.adminsettings') ;
    $form['secret_key'] = [  
      '#type' => 'number',  
      '#title' => $this->t('Secret Key'),  
      '#description' => $this->t('Secret Key'),  
      '#default_value' => $config->get('secret_key'),  
    ];
    $form['secret_code'] = [  
      '#type' => 'number',  
      '#title' => $this->t('Secret Code'),  
      '#description' => $this->t('Secret Code'),  
      '#default_value' => $config->get('secret_code'),  
    ];           
    return parent::buildForm($form, $form_state);  
  } 
  /**  
   * {@inheritdoc}  
   */  
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    parent::submitForm($form, $form_state);  

    $this->config('custom.adminsettings')  
    	->set('secret_key', $form_state->getValue('secret_key')) 
    	->set('secret_code', $form_state->getValue('secret_code'));  
    $this->config('custom.adminsettings')->save();  
  }   
} 
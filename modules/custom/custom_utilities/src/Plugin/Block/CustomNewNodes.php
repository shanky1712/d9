<?php
/**
 * @file
 * Contains \Drupal\custom_utilities\Plugin\Block\RecentNodes.
 */
namespace Drupal\custom_utilities\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;
use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\custom_utilities\Helper\GetNodes;
/**
 * Provides a 'Custom New Node' Block
 * @Block(
 *   id = "custom_new_nodes",
 *   admin_label = @Translation("Custom New Node Block"),
 *   category = @Translation("Custom New Node Block")
 * )
 */
class CustomNewNodes extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
	$node_data = GetNodes::NodeTitle();
	// echo 'hi';
	// var_dump($output);
    return array(
      // '#type' => 'markup',
      // '#markup' => t('Hello World'),
      '#theme' => 'custom_new_nodes',
	    '#cache' => array(
	      'max-age' => 0,
	    ),      
      '#report_rows' => $node_data
    );
  }
}
<?php
namespace Drupal\custom_utilities\Helper;
class GetNodes {
  /**
   * @return mixed
   */
  public static function NodeTitle() {
	$query = \Drupal::entityQuery('node')
	  ->condition('status', 1); //published or not
	  // ->condition('type', 'article'); //specify results to return
	$nids = $query->execute();
	$nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
	$node_data = [];
	$i=0;
	foreach ($nodes as $node) {
		$node_data[$i]['title'] = $node->get('title')->value;
		$node_data[$i]['nid'] = $node->get('nid')->value;
		$i++;
	}
	return $node_data;
  }
 }
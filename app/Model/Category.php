<?php
class Category extends AppModel {
	var $name = 'Category';
	var $primaryKey = 'cat_id';
	var $displayField = 'cat_name';
	var $validate = array(
		'cat_id' => array(
			'numeric' => array(
				'rule' => array('numeric')

			),
		),
		'cat_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The category must have a title.'

			)
		),
		'cat_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A description is mandatory.'

			)
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed


}

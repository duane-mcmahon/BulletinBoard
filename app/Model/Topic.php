<?php
class Topic extends AppModel {
	var $name = 'Topic';
	var $primaryKey = 'topic_id';
	var $displayField = 'topic_subject';
    var $findMethods = array('search' => true);

    var $hasOne = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => false,
            'conditions' => array(
                'Category.cat_id = Topic.topic_cat'

            )
        )
    );


    public function beforeSave($options = array())
    {

        $loggedInUser = AuthComponent::user();
        $userId = $loggedInUser['user_id'];
        $this->data['Topic']['topic_by'] = $userId;
        return true;

    }

    protected function _findSearch($state, $query, $results = array()) {
        if ($state === 'before') {
            $searchQuery = Hash::get($query, 'searchQuery');
            $searchConditions = array(
                'or' => array(
                    "Topic.topic_subject LIKE" => '%' . $searchQuery . '%',
                    "Category.cat_name LIKE" => '%' . $searchQuery . '%'
                )
            );
            $query['conditions'] = array_merge($searchConditions, (array)$query['conditions']);
            return $query;
        }
        return $results;
    }



}

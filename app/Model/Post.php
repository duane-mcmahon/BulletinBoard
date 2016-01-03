<?php
App::uses('Topic', 'Model');

class Post extends AppModel {
    var $findMethods = array('search' => true);
    var $name = 'Post';
    var $primaryKey = 'post_id';
    var $actsAs = array('Tree');

    var $validate = array(
        'post_id' => array(
            'numeric' => array(
                'rule' => array('numeric')
            ),
        ),
        'post_content' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The post must have some content',

            ),

        ),

        'post_date' => array(
            'date' => array(
                'rule' => array('date')

            ),
        ),
        'post_cat' => array(
            'numeric' => array(
                'rule' => array('numeric')

            ),
        ),
        'post_topic' => array(
            'numeric' => array(
                'rule' => array('numeric')

            ),
        ),
        'post_by' => array(
            'numeric' => array(
                'rule' => array('numeric')

            ),
        ),
        'parent_id' => array(
            'numeric' => array(
                'rule' => array('numeric')

            )
        ),
    );

    //Model Associations

    var $hasOne = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => false,
            'conditions' => array(
                'Category.cat_id = Post.post_cat'

            )
        ),
        'Topic' => array(
            'className' => 'Topic',
            'foreignKey' => false,
            'conditions' => array(
                'Topic.topic_id = Post.post_topic'

            )
        ),
        'User' => array(

            'className' => 'User',
            'foreignKey' => false,
            'conditions' => array(
                'User.user_id = Post.post_by'

            )

        )
    );


    //if the topic doesn't exist, add it.
    public function beforeSave($options = array())
    {

        //parent::beforeSave($options);

        //print_r($this->data);

            $loggedInUser = AuthComponent::user();

            $found = false;

            $userId = $loggedInUser['user_id'];


        $this->data['Post']['post_by'] = $userId;


        $this->data['Post']['post_date'] = (new DateTime())->format('Y-m-d');//format('Y-m-d H:i:s')



            if (!empty($this->data['Topic']['topic_subject'])) {


                $str = $this->data['Topic']['topic_subject'];

                $num = $this->data['Post']['post_cat'];

                $subject = new Topic();

                $found = $subject->find('first', array(

                    'conditions' => array('Topic.topic_subject LIKE' => $str,
                        'Topic.topic_cat =' => $num)

                ));


                if (!$found) {

                    $subject->create();
                    //create topic
                    $subject->save(
                        array(
                            'topic_subject' => $this->data['Topic']['topic_subject'],
                            'topic_date' => (new DateTime())->format('Y-m-d'),
                            'topic_cat' => $this->data['Post']['post_cat'],
                            'topic_by' => $userId
                        )
                    );

                    //see also save associated model method cakephp
                    $this->data['Post']['post_topic'] = $this->Topic->getLastInsertId();


                    return true;

                }


                $this->data['Post']['post_topic'] = $found['Topic']['topic_id'];


                return true;

            }

        //nothing
        return true;

    }

    protected function _findSearch($state, $query, $results = array()) {

        if ($state === 'before') {

            $searchQuery = Hash::get($query, 'searchQuery');

            $minQuery = Hash::get($query, 'minQuery');

            $maxQuery = Hash::get($query, 'maxQuery');

            $catQuery = Hash::get($query, 'categoryQuery');

            $searchConditions = array(
                'or' => array(
                    "Topic.topic_subject LIKE" => '%' . $searchQuery . '%',
                    "User.user_name LIKE" => '%' . $searchQuery . '%'
                    // ,"Post.post_content" => '%' . $searchQuery . '%' (not working)
                ),
                'and' => array(

                    'YEAR(Post.post_date) between ? and ?' => array($minQuery, $maxQuery),
                    "Post.post_cat" =>  $catQuery

                )
            );

            $query['conditions'] = array_merge($searchConditions, (array)$query['conditions']);

            return $query;
        }

        return $results;
    }

}

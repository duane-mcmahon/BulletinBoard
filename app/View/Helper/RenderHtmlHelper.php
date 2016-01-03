<?php


class RenderHtmlHelper extends AppHelper
{


    var $helpers = array('Html');  // include the HTML helper


    function renderPosts($postsArray)
    {
        //set return for the first time
        if (!isset($return)) {
            $return = "";
        }
        $return .= '<ul>';
        //create list
        foreach ($postsArray as $post) {

            $return .= '<li>';

            if (!empty($post['Post'])) {

                $return .= "[Category: <font color='red'><em>" . $post['Category']['cat_name'] . "</em></font>]  ";

                $return .= $this->Html->link($post['Topic']['topic_subject'], array('controller' => 'posts', 'action' => 'view', $post['Post']['post_id']), array('escape' => false));

            } else {

                $return .= $post['Topic']['topic_subject'];

            }
            //if post has children, go deeper
            if (!empty($post['children'])) {
                $return .= $this->renderPosts($post['children']);
            }
            $return .= '</li>';
        }
        $return .= '</ul>';
        return $return;
    }

}
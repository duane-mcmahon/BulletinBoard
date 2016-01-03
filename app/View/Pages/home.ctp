<?php






//prepare the table
echo "<table class='table table-bordered' >
    <tr>
        <th><h4>Category</h4></th>
        <th><h4>Threads</h4></th>
    </tr>";

foreach ($posts as $category):


    if (!empty($category['Threads'])) {
        echo "<tr>";
        echo "<td>";
        echo $category['Category'];
        echo "</td>";

        if (!empty($category['Threads'])) {


        echo "<td>";

            echo $this->RenderHtml->renderPosts($category['Threads']); //render the $result returned.

            echo "</td>";
        }
    }
endforeach;
?>
</table>


    <div id="posts-list"  style="width:50%" ></div>















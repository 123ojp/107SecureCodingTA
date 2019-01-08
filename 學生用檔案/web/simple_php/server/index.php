<?php 
        if( empty($_POST['sometext']) ) { 
?> 
        <form class="form-signin text-center" method="POST" action=".">
            <input type="text" name="sometext"> 
            <button type="submit">POST</button>
        </form> 
<?php 
} else {  
    echo "You Post :".$_POST['sometext']; 
}
?> 

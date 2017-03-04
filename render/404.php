<?php
 require_once('htmlrender/htmlrender.php');

?>
<style>
@import url('https://fonts.googleapis.com/css?family=Catamaran');
.dnetext{
	width:100%;
	height:100%;
	font-size: 10em;color: rgba(255, 9, 9, 0.9);
    text-shadow: 0 0 20px #566ada;
    font-family: 'Catamaran', sans-serif;
}
@media only screen and (max-width: 500px) {
    .dnetext {
        font-size: 2em !important;
    }
}
</style>
<hr>
<div class="dnetext"><center>404<br><small>Page does not exist</small></center></div>
<?php $obj->footer();?>

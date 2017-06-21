<?php require_once 'class_facebook/facebook.php';
if($_SESSION['username'] == "")
{
header('Location: login.php');
}
?>
<?php include 'header.php'; ?>

<a href="logout.php" id="log_out">Logout</a>
<span id="welcome">Welcome <?=$_SESSION['username']?></span>
    <div class="grid_12"><br>
<?php
//instanciamos la clase facebook y creamos el avatar
$nuevo = new comentario();
$ema = $_SESSION['email'];
$gravatar = $nuevo->get_gravatar($ema);
?>
    <!--formulario para crear nuevas entradas-->
    <div class="grid_7 push_2" id="form_messages">
        <h1>Escribe algo</h1>
        <form method="post" action="new_entry.php">
            <textarea name="newentry" class="comment" cols="44" rows="2" maxlength="250"  id="newentry"></textarea>
            <br />
            <input type="submit"  value="Create new entry" class="send_entry"/>
        </form>
    </div><br><br><br>
    <div class="newscomments" id="other_comments" style="margin-top: 12px"></div><br>
<?php
//recorremos los mensajes y los comentarios 
$show_messages = $nuevo->messages($_SESSION['id']);
    if(!(empty($show_messages)))
    {
    foreach($show_messages as $message){
        $id=$message['id'];
        $comments = $nuevo->comments($id);
    ?>
        <br>
        <div class="grid_5 push_3 messages" id="other_comments" style="margin-top: 10px">
        <img src="<?=$gravatar?>" width="40" height="40" /><br><br>
        <?=$message['username']?><span style="float: right;"><?=$message['date_message']?></span><br><br>
        <?=$nuevo->link($message['message'])?>
        </div><br><br><br><br><br><br><br><br>
        <div class="grid_5 push_3" id="form_messages">
            <form method="post" action="">
                <textarea name="comment" class="comment" cols="44" rows="2" maxlength="250"  id="comment_textarea<?=$id?>"></textarea>
                <br />
                <input type="submit"  value="Comment"  id="<?=$id?>" class="send_comment"/>
            </form>
        </div><br><br><br><br><br>
        <?php
        if(!empty($comments))
        {
            foreach($comments as $row_comment)
            {
                ?>
                <div class="newscomments" id="carga_comentarios<?=$id?>"></div><br>
                <div class="grid_4 push_3 comments" id="comments<?=$id?>">
                <img src="<?=$gravatar?>" width="25" height="25" /><br><br>
                <?=$row_comment['user_comment']?><span style="float: right;"><?=$row_comment['date_comment']?></span><br><br>
                <?=$nuevo->link($row_comment['comment'])?>
                </div><br><br><br><br><br>
                <?php
            }
        }
    }
}
?>
</div><br><br>
<?php include 'footer.php'; ?>
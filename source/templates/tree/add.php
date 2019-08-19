<?php include_once '_helper/node-view.php' ?>
<form method="post">
    <table class="table text-center">
        <tr>
            <td colspan="2" class="text-center">
                <p><strong>Add new child to node:</strong></p>
                <?php echo $this->data['parent']->getUsername(); ?><br/>(credits
                left: <?php echo $this->data['parent']->getCreditsLeft(); ?>) (credits
                right: <?php echo $this->data['parent']->getCreditsRight(); ?>)
            </td>
        </tr>
        <tr>
            <td><label for="username">Username:</label></td>
            <td>
                <input type="text" name="username" class="form-control" id="username" value="<?php echo $this->data['username'] ?>" />
                <?php if(isset($this->data['errors']['username'])) {echo $this->data['errors']['username'];} ?>
            </td>
        </tr>
        <tr>
            <td><label for="credits_left">Credits left:</label></td>
            <td>
                <input type="text" name="credits_left" class="form-control" id="credits_left" value="<?php echo $this->data['creditsLeft'] ?>" />
                <?php if(isset($this->data['errors']['credits_left'])) {echo $this->data['errors']['credits_left'];} ?>
            </td>
        </tr>
        <tr>
            <td><label for="credits_right">Credits right:</label></td>
            <td>
                <input type="text" name="credits_right" class="form-control" id="credits_right" value="<?php echo $this->data['creditsRight'] ?>" />
                <?php if(isset($this->data['errors']['credits_right'])) {echo $this->data['errors']['credits_right'];} ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
            </td>
        </tr>
    </table>
</form>

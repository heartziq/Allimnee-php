<h2>Login</h2>

<?php echo form_open('credential/login')?>
<table>
   <tr>
        <td>
            <label for="email">Email Address</label>
            <input type="input" name="email"><br/>
        </td>
        
        <td>
            <p><?php echo form_error("email"); ?></p>
        </td>
    </tr>
    
    <tr>
        <td>
            <label for="pass">Password</label>
            <input type="password" name="pass"><br/>
        </td>
        <td>
            <p><?php echo form_error("pass"); ?></p>
        </td>
    </tr>
    
    <tr>
        <td>
        <input type="submit" name="submit" value="Login" />
        </td>
    </tr>
    
</table>
    
</form>

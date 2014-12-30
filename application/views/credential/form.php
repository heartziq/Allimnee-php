<h2>Registration</h2>

<?php echo form_open('credential/register')?>
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
            <label for="cPass">Confirmed Password</label>
            <input type="password" name="cPass"><br/>
        </td>
        <td>
            <p><?php echo form_error("cPass"); ?></p>
        </td>
    </tr>

    <tr>
        <td>
            <input type="submit" name="submit" value="Register" />
        </td>
    </tr>
        
</table>
    
</form>

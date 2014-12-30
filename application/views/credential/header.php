<!DOCTYPE html>
<html>

    <head>
    
        <title>allimnee</title>

    </head>
    
    <body>
        <?php $is_logged = FALSE; ?>
        
        <?php if (! empty($username['email'])){
        
            $is_logged = TRUE;
            $greetings = "Welcome, ".$username['email']; ?>
            
            <p><i><?php echo $greetings; ?></i>
            
        <?php } else { ?>
            
            <h3> LOGIN LAH! </h3>

        <?php } ?>
        
        <table>
            <tr>
            
            <?php if ($is_logged == FALSE) { ?>
            
            <td>
                <!-- register link -->
                <a href="<?php echo base_url().'index.php/credential/register'?>">register</a>
            </td>
            
            <td>
                <!-- login link -->
                <a href="<?php echo base_url().'index.php/credential/signin'?>">login</a>     

                
            </td>
            
    
            
            </tr>
            
        
        
        </table>
        
        

        
        

        
    </body>
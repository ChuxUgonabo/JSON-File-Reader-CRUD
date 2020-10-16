<?php
//CSS Grid adotped from : https://www.w3schools.com/css/css_grid.asp


class Page  {

    //Title - MAKE SURE YOU SET THIS!
    private static $title = 'JOHN-VIANNEY 300303015';

    static function setTitle(string $title) {
        self::$title = $title;
    }

    static function header()    { ?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>
        <?php echo self::$title; ?>
    </title>
    <link rel="stylesheet" href="css/grid.css">
    </head>
    <body>

    <div class="grid-container">
    <div class="item1"><H1><?php echo self::$title; ?></H1></div>

    <?php }

    static function footer()    { ?>

    </body>
    </html>

    <?php } 

    static function editForm($app = null)  { ?>

    <DIV class="item7">
    
    <?php 
    //Check if an app was passed in
    if (is_null($app))   {
        //If not then display a message
        echo '<p>Please select an app to Edit.';
        echo '</DIV>';
    
        //otherwise.. show the edit form with the $app data that was passed in.
    } else { ?>

        <FORM ACTION="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="POST">
            <INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $app->getId(); ?>">
        </TABLE>
        </FORM>
        </DIV>

        <?php }
    }

    static function appsList($apps)    {  ?>

    <div class="item3">

    <?php
    //Check if thewere were any apps to List
        if (empty($apps))    {
            //If not display a message.
            echo '<p> There are no records to display. </p>';
    } else { ?>
        <TABLE>
        <TR>
            <TH>AppName</TH>
            <TH>AppVersion</TH>
            <TH>Platform</TH>
            <TH>Author</TH>
            <TH>Edit</TH>
            <TH>Delete</TH>

        </TR>

            <?php
            //Iterate through the headers add a table row and columns as required using the getters
            foreach ($apps as $app) {
                echo '<TR>';
                echo '<TD>'.$app->getAppName().'</TD>';
                echo '<TD>'.$app->getAppVersion().'</TD>';
                echo '<TD>'.$app->getPlatform().'</TD>';
                echo '<TD><a href=mailto:'.$app->getEmail().'>'.$app->getAuthor().'</a></TD>';
                echo '<TD><a href=?action=edit&id='.$app->getId().'>Edit</a></TD>';
                echo '<TD><a href=?action=delete&id='.$app->getId().'>Delete</a></TD>';
                echo '</TR>';
            }
    }
        ?>
    </TABLE>

    </div> 

    <?php }

    static function showUpload()    { ?>

    <DIV CLASS="item4">
    <form ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype = "multipart/form-data">

         <p>Please load the App file.</p>
        <input type="file" name="appFile">
        <INPUT type="Submit" name="submitF" value="Import JSON">
    </FORM>
    </DIV>

    <?php }
    
    static function showMessages(Array $messages)  {


        echo '<div class="item6">';
        //Check for messages
        if (is_array($messages))   {
            //Iterate through each message and create a list item.
            foreach($messages as $m){
                echo $m;
            }
            
        } 
        
        echo '</div>';
}

    static function showXMLExport() { ?>
    
    <DIV class="item2">
    Click <A TARGET="_new">here</A> to Export to XML.
    </DIV>

<?php }

        static function showStats($stats)    {

            echo '<DIV id="item8">';

            //Print out a table
            echo '<TABLE>';
            echo '<THEAD>
                        <TD>Platform</TD>
                        <TD>Count</TD>
                </THEAD>';
                //Go through each stat object and display the platform name and count.
            echo '</DIV>';

        }

        
    static function addForm()  { ?>

        <DIV class="item7">  
            <FORM ACTION="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="POST">
                <div>
                    <INPUT TYPE="hidden" NAME="id" >
                    <label>App Name: </label>
                    <input type="text" name="appName">
                </div>
                <div>
                    <label>App Version: </label>
                    <input type="text" name="appVersion">
                </div>
                <div>
                    <label>Platform: </label>
                    <input type="text" name="platform">
                </div>
                <div>
                    <label>Author: </label>
                    <input type="text" name="author">
                </div>
                <div>
                    <label>Email: </label>
                    <input type="email" name="email">
                </div>
                <div>
                    <input type="submit" name="submit">
                </div>
            </FORM>
        </DIV>
    
            <?php }
}
?>
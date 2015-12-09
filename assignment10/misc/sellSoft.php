<?php
include "top.php";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// variables for the classroom purposes to help find errors.

$debug = TRUE;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form
$option = "Hardgood";   
$dropSoft = "Jacket";
$brand = "";
$model = "";
$size = "";
$color = "Black";
$gender = "Male";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$brandERROR = false;
$modelERROR = false;
$sizeERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

// array used to hold form values that will be written to a CSV file
$dataRecord = array();


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck($path_parts, $yourURL, true)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.

    $option = htmlentities($_POST["radOption"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $option;
    
    $dropHard = htmlentities($_POST["lstDropHard"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $dropSoft;
    
    $brand = htmlentities($_POST["txtBrand"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $brand;

    $model = filter_var($_POST["txtModel"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $model;
    
    $size = filter_var($_POST["txtSize"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $size;

    $color = htmlentities($_POST["lstColor"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $transportation;
    
    $gender = htmlentities($_POST["lstGender"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $transportation;
    
    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.

    if ($brand == "") {
        $errorMsg[] = "Please enter the brand";
        $brandERROR = true;
    }

    if ($model == "") {
        $errorMsg[] = "Please enter the model";
        $modelERROR = true;
    }

    if ($size == "") {
        $errorMsg[] = "Please enter the size";
        $sizeERROR = true;
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.

/////////////////////THIS IS WHERE WE CONNECT TO DATABASE////////////////////////////
        
        $query = 'INSERT INTO tblSoftGoods SET fldSoftGood = ?, fldBrand = ?,'
                . 'fldModel = ?, fldColor = ?, fldSize = ?, fldGender = ?';
        
        $data = array($dropSoft, $brand, $model, $color, $size, $gender);
        $results = $thisDatabaseWriter->testquery($query, $data);
        $results = $thisDatabaseWriter->insert($query, $data);
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f Create message
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).

        $message = '<h2>Success!</h2>'
                . '<p> This is the information we have received from you. If there is a change in your '
                . 'info, feel free to re-submit any changes. Thanks for your help!</p>';

    } // end form is valid
} // ends if form was submitted.
//#############################################################################
//
// SECTION 3 Display Form
//
?>

<article id="main">

    <?php
//####################################
//
// SECTION 3a.
//
// 
// 
// 
// If its the first time coming to the form or there are errors we are going
// to display the form.
    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
        print "<h1>Your Request has ";
        print "been processed</h1>";
        print $message;
    } else {


        //####################################
        //
        // SECTION 3b Error Messages
        //
        // display any error messages before we print out the form

        if ($errorMsg) {
            print '<div id="errors">';
            print "<ol>\n";
            foreach ($errorMsg as $err) {
                print "<li>" . $err . "</li>\n";
            }
            print "</ol>\n";
            print '</div>';
        }


        //####################################
        //
        // SECTION 3c html Form
        //
        /* Display the HTML form. note that the action is to this same page. $phpSelf
          is defined in top.php
          NOTE the line:

          value="<?php print $email; ?>

          this makes the form sticky by displaying either the initial default value (line 35)
          or the value they typed in (line 84)

          NOTE this line:

          <?php if($emailERROR) print 'class="mistake"'; ?>

          this prints out a css class so that we can highlight the background etc. to
          make it stand out that a mistake happened here.

         */
        ?>

        <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmSell">


                <fieldset class="wrapperTwo">
                    <h2>Please complete the following form</h2>

                    
                    <fieldset  class="listboxType">	
                        <legend>
                            <label for="lstDrop">Softgood</label></legend>
                        <select id="lstDrop" 
                                name="lstDrop" 
                                tabindex="200" >
                            <option <?php if ($dropSoft == "Jackets") print " selected "; ?>
                                value="Jackets">Jackets</option>

                            <option <?php if ($dropSoft == "Pants") print " selected "; ?>
                                value="Pants" >Pants</option>
                            
                            <option <?php if ($dropSoft == "Gloves") print " selected "; ?>
                                value="Gloves" >Gloves</option>

                            <option <?php if ($dropSoft == "Other") print " selected "; ?>
                                value="Other" >Other</option>
                                                   
                        </select>
                    </fieldset>
                    
                    
                    <fieldset class="text">
                        <label for="txtBrand" class="required">Brand
                            <input type="text" id="txtBrand" name="txtBrand"
                                   value="<?php print $brand; ?>"
                                   tabindex="300" maxlength="45" placeholder="Enter the brand"
                                   <?php if ($brandERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>
                        </label>

                        <label for="txtModel" class="required">Model
                            <input type="text" id="txtModel" name="txtModel"
                                   value="<?php print $model; ?>"
                                   tabindex="310" maxlength="45" placeholder="Enter the model"
                                   <?php if ($modelERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   >
                        </label>

                        <label for="txtSize" class="required">Size
                            <input type="text" id="txtSize" name="txtSize"
                                   value="<?php print $size; ?>"
                                   tabindex="320" placeholder="Enter the size"
                                   
                                   onfocus="this.select()" 
                                   >
                        </label>
                    </fieldset> <!-- ends contact -->
                    
                    <fieldset  class="listboxColor">	
                        <legend>
                            <label for="lstColor">Color</label></legend>
                        <select id="lstColor" 
                                name="lstColor" 
                                tabindex="400" >
                            <option <?php if ($color == "Black") print " selected "; ?>
                                value="Black">Black</option>
                            
                            <option <?php if ($color == "White") print " selected "; ?>
                                value="White">White</option>
                            
                            <option <?php if ($color == "Red") print " selected "; ?>
                                value="Red">Red</option>
                            
                            <option <?php if ($color == "Blue") print " selected "; ?>
                                value="Blue">Blue</option>
                            
                            <option <?php if ($color == "Green") print " selected "; ?>
                                value="Green">Green</option>
                            
                            <option <?php if ($color == "Grey") print " selected "; ?>
                                value="Grey">Grey</option>
                            
                            <option <?php if ($color == "Orange") print " selected "; ?>
                                value="Orange">Orange</option>
                            
                            <option <?php if ($color == "Purple") print " selected "; ?>
                                value="Purple">Purple</option>
                            
                            <option <?php if ($color == "Yellow") print " selected "; ?>
                                value="Yellow">Yellow</option>
                            
                            <option <?php if ($color == "Brown") print " selected "; ?>
                                value="Brown">Brown</option>
                            
                            <option <?php if ($color == "Pink") print " selected "; ?>
                                value="Pink">Pink</option>                                    
                        </select>

                        
                        <legend>
                            <label for="lstGender" id="gender">Gender</label></legend>
                        <select id="lstGender" 
                                name="lstGender" 
                                tabindex="500" >
                            <option <?php if ($gender == "M") print " selected "; ?>
                                value="M">Male</option>
                            
                            <option <?php if ($gender == "W") print " selected "; ?>
                                value="W">Female</option>
                            
                            <option <?php if ($gender == "U") print " selected "; ?>
                                value="U">Unisex</option>        
                        </select>
                        
                    </fieldset>
                </fieldset> <!-- ends wrapper Two -->
                   
                    <fieldset class="sellButton">
                        <legend></legend>
                        <input type="submit" id="btnSell" name="btnSubmit" value="Register" tabindex="900" class="button">
                    </fieldset> <!-- ends buttons -->
 
     
        </form>

        <?php
    } // end body submit
    ?>

</article>

<?php include "footer.php"; ?>

</body>
</html>
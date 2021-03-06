<?php 
if (isset($_GET['turnOnUnderConstructionMode']))
{
    update_option('underConstructionActivationStatus', 1);
    
}

if (isset($_GET['turnOffUnderConstructionMode']))
{
    update_option('underConstructionActivationStatus', 0);
    
}


// ======================================
// 		process display options
// ======================================

if (isset($_POST['display_options']))
{
    if ($_POST['display_options'] == 0) //they want to just use the default
    {
        update_option('underConstructionDisplayOption', 0);
    }
    
    if ($_POST['display_options'] == 1) //they want to use the default with custom text
    {
        $values = array('pageTitle'=>'', 'headerText'=>'', 'bodyText'=>'');
        
        if (isset($_POST['pageTitle']))
        {
            $values['pageTitle'] = attribute_escape($_POST['pageTitle']);
        }
        
        if (isset($_POST['headerText']))
        {
            $values['headerText'] = attribute_escape($_POST['headerText']);
        }
        
        if (isset($_POST['bodyText']))
        {
            $values['bodyText'] = attribute_escape($_POST['bodyText']);
        }

        
        update_option('underConstructionCustomText', $values);
        update_option('underConstructionDisplayOption', 1);
    }
    
    if ($_POST['display_options'] == 2) //they want to use their own HTML
    {
        if (isset($_POST['ucHTML']))
        {
            update_option('underConstructionHTML', attribute_escape($_POST['ucHTML']));
            update_option('underConstructionDisplayOption', 2);
        }
    }
}

// ======================================
// 		process http status codes
// ======================================
if (isset($_POST['activate']))
{
    if ($_POST['activate'] == 0)
    {
        update_option('underConstructionActivationStatus', 0);
    }
    
    if ($_POST['activate'] == 1)
    {
        update_option('underConstructionActivationStatus', 1);
    }
}

// ======================================
// 		process on/off status
// ======================================
if (isset($_POST['http_status']))
{
    if ($_POST['http_status'] == 200)
    {
        update_option('underConstructionHTTPStatus', 200);
    }
    
    if ($_POST['http_status'] == 503)
    {
        update_option('underConstructionHTTPStatus', 503);
    }
}




?>
<noscript>
    <div class='updated' id='javascriptWarn'>
        <p>
            JavaScript appears to be disabled in your browser. For this plugin to work correctly, please enable JavaScript or switch to a more modern browser
        </p>
    </div>
</noscript>
<div class="wrap">
    <div id="icon-options-general" class="icon32">
        <br/>
    </div>
    <form method="post" action="<?php echo $GLOBALS['PHP_SELF'] . '?page=' . $this->mainOptionsPage; ?>">
        <h2>
            Under Construction
        </h2>
        <table>
            <tr>
                <td>
                    <h3>
                        Activate or Deactivate
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span>
                                Activate or Deactivate
                            </span>
                        </legend>
                        <label title="activate">
                            <input type="radio" name="activate" value="1"<?php if ($this->pluginIsActive()) { echo ' checked="checked"'; } ?>>
 on
                        </label>
                        <br/>
                        <label title="deactivate">
                            <input type="radio" name="activate" value="0"<?php if (!$this->pluginIsActive()) { echo ' checked="checked"'; } ?>>
 off
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        HTTP Status Code
                    </h3>
                    <p>
                        You can choose to send the standard HTTP status code with the under construction page, or send a 503 "Service Unavailable" status code. This will tell Google that
                        this page isn't ready yet, and cause your site not to be listed until this plugin is disabled
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span>
                                HTTP Status Code
                            </span>
                        </legend>
                        <label title="HTTP200">
                            <input type="radio" name="http_status" value="200"<?php if ($this->httpStatusCodeIs(200)) { echo ' checked="checked"'; } ?>>
 HTTP
                            200
                            -

 ok
                        </label>
                        <br/>
                        <label title="HTTP503">
                            <input type="radio" name="http_status" value="503"<?php if ($this->httpStatusCodeIs(503)) { echo ' checked="checked"'; } ?>>
 HTTP
                            503
                            -

 Service Unavailable
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        Display Options
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span>
                                Display Options
                            </span>
                        </legend>
                        <label title="defaultPage">
                            <input type="radio" name="display_options" value="0" id="displayOption0"<?php if ($this->displayStatusCodeIs(0)) { echo ' checked="checked"'; } ?>>
 Display the default under construction page
                        </label>
                        <br/>
                        <label title="HTTP503">
                            <input type="radio" name="display_options" value="1" id="displayOption1"<?php if ($this->displayStatusCodeIs(1)) { echo ' checked="checked"'; } ?>>
 Display the default under construction page
                            ,

 but use custom text
                        </label>
                        <br/>
                        <label title="HTTP503">
                            <input type="radio" name="display_options" value="2" id="displayOption2"<?php if ($this->displayStatusCodeIs(2)) { echo ' checked="checked"'; } ?>>
 Display a custom page using your own HTML
                        </label>
                    </fieldset>
                </td>
            </tr>
        </table>
        <div id="customText"<?php if (!$this->displayStatusCodeIs(1)) { echo ' style="display: none;"'; } ?>>
            <h3>
                Display Custom Text
            </h3>
            <p>
                The text here will replace the text on the default page
            </p>
            <table>
                <tr valign="top">
                    <th scope="row">
                        <label for="pageTitle">
                            Page Title
                        </label>
                    </th>
                    <td>
                        <input name="pageTitle" type="text" id="pageTitle" value="<?php echo $this->getCustomPageTitle(); ?>" class="regular-text" size="50">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="headerText">
                            Header Text
                        </label>
                    </th>
                    <td>
                        <input name="headerText" type="text" id="headerText" value="<?php echo $this->getCustomHeaderText(); ?>" class="regular-text" size="50">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="bodyText">
                            Body Text
                        </label>
                    </th>
                    <td>
                        <?php echo '<textarea rows="2" cols="44" name="bodyText" id="bodyText" class="regular-text">'.trim($this->getCustomBodyText()).'</textarea>'; ?>
                    </td>
                </tr>
            </table>
        </div>
        <div id="customHTML"<?php if (!$this->displayStatusCodeIs(2)) { echo ' style="display: none;"'; } ?>>
            <h3>
                Under Construction Page HTML
            </h3>
            <p>
                Put in this area the HTML you want to show up on your front page
            </p>
            <?php echo '<textarea name="ucHTML" rows="15" cols="75">'.$this->getCustomHTML().'</textarea>'; ?>
        </div>
        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="Save Changes" id="submitChangesToUnderConstructionPlugin" />
        </p>
    </form>
</div>

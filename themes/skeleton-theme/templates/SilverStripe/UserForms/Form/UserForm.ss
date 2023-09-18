<div id="main-one">
    <h1>Contact Us</h1>
    <% with $SiteConfig %>
        <div id="social-links-contact">
            <a href="$FacebookLink" target='_blank'><img id="facebook-black" src="$ThemeDir/images/facebook-black.svg" alt="Link to our Facebook page"></a>
            <a href="$InstaLink" target='_blank'><img id="instagram-black" src="$ThemeDir/images/instagram-black.svg" alt="Link to our Instagram page"></a>
            <a href="$YoutubeLink" target='_blank'><img id="youtube-black" src="$ThemeDir/images/youtube-black.svg" alt="Link to our Youtube page"></a>
        </div>
        <div>
            <p><span class="strong">Phone:</span> $Phone</p>
            <p><span class="strong">Email:</span> $Email</p>
        </div>
    <% end_with %> 
</div>

<div id="main-two">

    <h1>Make an enquiry here</h1>

    <form $AttributesHTML>

    <% include SilverStripe\\UserForms\\Form\\UserFormProgress %>
    <% include SilverStripe\\UserForms\\Form\\UserFormStepErrors %>

    <% if $Message %>
        <p id="{$FormName}_error" class="message $MessageType">$Message</p>
    <% else %>
        <p id="{$FormName}_error" class="message $MessageType" aria-hidden="true" style="display: none;"></p>
    <% end_if %>

    <% if $Legend %>
        <fieldset>
            <legend>$Legend</legend>
            <% include SilverStripe\\UserForms\\Form\\UserFormFields %>
        </fieldset>
    <% else %>
        <div class="userform-fields">
            <% include SilverStripe\\UserForms\\Form\\UserFormFields %>
        </div>
    <% end_if %>

    <% if $Steps.Count > 1 %>
        <% include SilverStripe\\UserForms\\Form\\UserFormStepNav %>
    <% else %>
        <% include SilverStripe\\UserForms\\Form\\UserFormActionNav %>
    <% end_if %>

    </form>

</div>

<footer>
    <% with $SiteConfig %>
        <div id="social-links">
            <a href="$FacebookLink" target='_blank'><img id="facebook" src="$ThemeDir/images/facebook.svg" alt="Link to our Facebook page"></a>
            <a href="$InstaLink" target='_blank'><img id="instagram" src="$ThemeDir/images/instagram.svg" alt="Link to our Instagram page"></a>
            <a href="$YouTubeLink" target='_blank'><img id="youtube" src="$ThemeDir/images/youtube.svg" alt="Link to our Youtube page"></a>
        </div>
        <p><span class="strong">Phone:</span> $Phone</p>
        <p><span class="strong">Email:</span> $Email</p>
        <p>&copy; Copryright 2023</p>
    <% end_with %>   
</footer>
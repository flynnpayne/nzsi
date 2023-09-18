<section class="blog-profile-summary">
    <% if $CurrentProfile.BlogProfileImage %>
    <div class="profile-image">
        $CurrentProfile.BlogProfileImage.Fill(500,500)
    </div>
	<% end_if %>
	<div class="profile-content">
        <h1>Posts by $CurrentProfile.FirstName $CurrentProfile.Surname</h1>
	</div>
</section>

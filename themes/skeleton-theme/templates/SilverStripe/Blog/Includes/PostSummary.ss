<div class="post-summary">
	<h2>
        <% if $MenuTitle %>$MenuTitle
        <% else %>$Title<% end_if %>
	</h2>

	<% include SilverStripe\\Blog\\EntryMeta %>

	<% if $Summary %>
		$Summary
	<% else %>
		<p>$Excerpt</p>
	<% end_if %>
	    <p class="bottom">
			<a class="link-button" href="$Link">
				<%t SilverStripe\\Blog\\Model\\Blog.ReadMore "Read more" title=$Title %>
			</a>
		</p>
</div>

<% require css('silverstripe/blog: client/dist/styles/main.css') %>

<div class="blog-entry content-container <% if $SideBarView %>unit size3of4<% end_if %>">
	<div id="main-one">
		<h1>$Title</h1>
        <% include SilverStripe\\Blog\\EntryMeta %>
	</div>

	<div id="main-two">
		<div id="blog-content">$Content</div>
		<% if $FeaturedImage %>
			<div class="post-image" id="big">$FeaturedImage</div>
		<% end_if %>
	</div>

	$Form
	$CommentsForm
</div>

<% include SilverStripe\\Blog\\BlogSideBar %>

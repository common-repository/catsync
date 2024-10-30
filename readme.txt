=== CatSync ===
Contributors: MLynch1985
Tags: Category, Sync, CMS, Tables, Post, Import
Requires at least: 2.5
Tested up to: 2.9.2
Stable tag: 0.8.6

CatSync is a simple plugin used to sync post and categories from an external table


== Description ==

Description: CatSync is directed towards users who need to manage a large number of blog posts created from an external database.  Users will be able to dynamically create blog posts pulling information from external tables and placing them in specified categories. They also can edit basic post meta_data to be used during the import process such as comment_status or ping_status.  In addition to creating posts, a user can remove an entire category of posts.  CatSync also supports importing from multiple tables into the same category by simply appending the new posts to the current list.  This plug-in is still under development.


== Installation ==

1. Upload the `CatSync` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter External Database Connection Information
4. Create a new category if needed
5. Set your post defaults if needed, otherwise defaults will be used
6. Execute the sync process

== Changelog ==

= 0.1 =
Initial Creation

= 0.2 =
Fixed import to work properly
Simplified the user interface
Added new features:
	-Sync, Append, Remove posts
	-Add new category with option for parent

= 0.4 =
Added Post Defaults Menu

= 0.5 =
Added comments and cleaned up the code
Fixed issues with Post Defaults Menu

= 0.6 =
Added support to connect to external database

= 0.7 =
Removed need to enter WordPress database information
Replaced Source Column textbox with a drop-down menu

= 0.8 =
Added feature to include post_content
Cleaned up some of the code

= 0.8.6 =
Fixed dbSettings form to force all fields be completed
**Known Issue** Does not work in Internet Explorer
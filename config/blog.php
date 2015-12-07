<?php
return [
	'name' => 'Flatt Design',
	'title' => 'Flatt Blog',
	'subtitle' => 'Web Design, Development, and Various Other Things',
	'description' => 'Blog and Portfolio site for Flatt Design',
	'author' => 'Travis Flatt',
	'page_image' => 'home-bg.jpg',
	'posts_per_page' => 8,
	'rss_size' => 25,
	'uploads' => [
		'storage' => 's3',
		'webpath' => 'https://s3-us-west-2.amazonaws.com/flattdesign/blog/img'
	],
	'contact_email' => env('MAIL_FROM'),
];
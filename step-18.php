Array Filtering

=>array_filter

<?php

	class Post
	{
		public $title;
		public $author;
		public $published;

		public function __construct($title, $author, $published)
		{
			$this->title = $title;
			$this->author = $author;

			$this->published = $published;
		}
	}

	$posts = [
		new Post('First post', 'Sudha Murthy', true),
		new Post('Second Post', 'Durjoy Dutta', true),
		new Post('Third Post', 'Chetan Bhagat', false),

	];


	$unpublishedPosts = array_filter($posts, function ($post) {
		return $post->published;
	});
	var_dump($unpublishedPosts);
	?>
=>array_map

	<?php
	function cube($n)
	{
		return ($n * $n * $n);
	}

	$a = [1, 2, 3, 4, 5];
	$b = array_map('cube', $a);
	print_r($b);
	?>

=>array_column

	<?php

	$records = array(
		array(
			'id' => 123,
			'first_name' => 'John',
			'last_name' => 'Doe',
		),
		array(
			'id' => 456,
			'first_name' => 'Siya',
			'last_name' => 'Smith',
		),
		array(
			'id' => 789,
			'first_name' => 'Jane',
			'last_name' => 'Jones',
		),


	);

	$first_names = array_column($records, 'first_name');
	print_r($first_names);
	?>

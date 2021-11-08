<?php
    if (!is_file("data/count.txt"))
	{
		$count = fopen("data/count.txt", "w");
		fwrite($count, 1);
		fclose($count);
		return 0;
	}
	else
	{
		$count = fopen("data/count.txt", "r");
		$content = fread($count, 9);
		fclose($count);
		$count = fopen("data/count.txt", "w");
		$content++;
		fwrite($count, $content);
		fclose($count);
	}

	echo $content;

	?>
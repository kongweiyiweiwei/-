<?php
	session_start();
	
	//在内存中创建一个图片对象
	$image = imagecreatetruecolor(100, 30);

	//获取背景色对象
	$bgcolor = imagecolorallocate($image, 190, 234, 239);

	//背景色的填充
	imagefill($image, 0, 0, $bgcolor);

	$fontcontxt = "";

	for($i=0;$i<4;$i++){
		// 数学函数  rand(n,m)  在n 和m 之间随机生成 一个整数
		$temp = rand(0,9);
		$fontcontxt .= $temp;

		$fontsize = 6;
		$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		$x = $i*(100/4)+rand(5,10);
		$y = rand(5,10);

		imagestring($image, $fontsize, $x, $y, $temp, $fontcolor);
	}

	$_SESSION["sysCode"] = $fontcontxt;
	//设置干扰项
	// 防止软件读取

	// 雪花点
	for($i=0;$i<300;$i++){
		$pointcolor = imagecolorallocate($image, rand(80,200), rand(80,200), rand(80,200));
		imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
	}

	//干扰线
	for($i=0;$i<5;$i++){
		$linecolor = imagecolorallocate($image, rand(80,200), rand(80,200), rand(80,200));
		imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);
	}

	//设置响应头 响应数据格式
	header("Content-Type:image/png");
	imagepng($image);
	imagedestroy($image);


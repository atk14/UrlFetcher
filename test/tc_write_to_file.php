<?php
class TcWriteToFile extends TcBase {

	function test(){
		// GET
		$tmp_file = Files::GetTempFilename();
		$this->assertFalse(file_exists($tmp_file));

		$f = new UrlFetcher("https://jarek.plovarna.cz/unit-testing/dungeon-master.png");
		$this->assertTrue($f->fetchContent(array("write_to_file" => $tmp_file)));
		$this->assertFalse($f->errorOccurred());

		$this->assertTrue($f->found());
		$this->assertEquals("GET",$f->getRequestMethod());
		$this->assertEquals("image/png",$f->getHeaderValue("Content-Type"));
		$this->assertTrue(null === $f->getContent()); // content has been written into a file

		$this->assertTrue(file_exists($tmp_file));
		$this->assertEquals("c4f99bdb6a4feb3b41b1bcd56a4d7aa3",md5_file($tmp_file));

		unlink($tmp_file);

		// POST
		$tmp_file = Files::GetTempFilename();
		$this->assertFalse(file_exists($tmp_file));

		$f = new UrlFetcher("https://admin.plovarna.cz/unit-testing.php");
		$this->assertTrue($f->post("a=1&b=2",array("write_to_file" => $tmp_file)));

		$this->assertTrue($f->found());
		$this->assertEquals("POST",$f->getRequestMethod());
		$this->assertContains("text/html",$f->getHeaderValue("Content-Type"));
		$this->assertTrue(null === $f->getContent()); // content has been written into a file

		$content = Files::GetFileContent($tmp_file);

		$this->assertTrue((bool)preg_match("/Request method is POST/",$content));

		unlink($tmp_file);
	}
}

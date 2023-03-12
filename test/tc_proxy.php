<?php
class TcProxy extends TcBase {

	function test(){
		// http
		$uf = new UrlFetcher("http://example.com/");
		$this->assertEquals(200,$uf->getStatusCode());
		$this->assertContains("Example Domain",(string)$uf->getContent());

		// https
		$uf = new UrlFetcher("https://www.atk14.net/api/en/http_requests/detail/?format=json&requested_response_code=417",["proxy" => "tcp://127.0.0.1:8118"]);
		$uf->post(["a" => "b", "c" => "d"]);

		$this->assertEquals(417,$uf->getStatusCode());
		$this->assertEquals("Expectation Failed",$uf->getStatusMessage());

		$data = json_decode($uf->getContent(),true);
		$post_data = base64_decode($data["raw_post_data_base64"]);
		$this->assertEquals("a=b&c=d",$post_data);
	}
}

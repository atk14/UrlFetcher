<?php
class TcProxy extends TcBase {

	function test(){
		// http
		$uf = new UrlFetcher("http://example.com/",["proxy" => "tcp://127.0.0.1:8118"]);
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

		// Privoxy config
		$uf = new UrlFetcher("http://config.privoxy.org/",["proxy" => "tcp://127.0.0.1:8118"]);
		$this->assertEquals(200,$uf->getStatusCode());
		$this->assertContains("<title>Privoxy@localhost</title>",(string)$uf->getContent());

		$uf = new UrlFetcher("http://config.privoxy.org/");
		$this->assertEquals(200,$uf->getStatusCode());
		$this->assertContains("<title>Privoxy is not being used</title>",(string)$uf->getContent());
	}
}

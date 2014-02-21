<?php

class ExampleTest extends TestCase {

	/** Default preparation for each test
	 *
	 */
	public function setUp()
	{
	    parent::setUp(); // Don't forget this!

	    $this->prepareForTests();
	}

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}

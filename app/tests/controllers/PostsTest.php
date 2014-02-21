<?php

use Mockery as m;
use Way\Tests\Factory;

class PostsTest extends TestCase {

	use Way\Tests\ControllerHelpers;

	public function setUp()
	{
		parent::setUp();

		$this->mock = m::mock('Eloquent', 'Post');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();

		$this->attributes = Factory::post(['id' => 1]);
		$this->app->instance('Post', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'posts');

		$this->see('posts');
	}

	public function testCreate()
	{
		$this->call('GET', 'posts/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'posts');

		$this->assertRedirectedToRoute('posts.index');
	}

	public function testStoreFails()
	{
		$this->validate(false);
		$this->call('POST', 'posts');

		$this->assertRedirectedToRoute('posts.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'posts/1');

		$this->see('post');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'posts/1/edit');

		$this->see('Edit Post');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'posts/1');

		$this->assertRedirectedTo('posts/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'posts/1');

		$this->assertRedirectedTo('posts/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'posts/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}

<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get projects
     *
     * @return void
     */
    public function test_get_projects()
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);
    }

    /**
     * Test post projects
     *
     * @return void
     */
    public function test_post_projects()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/projects', [
            'user_id' => 1,
            'title' => 'test',
            'description' => 'test',
            'short_description' => 'test',
            'motivation' => 'test',
            'requirements' => 'test',
            'total_team' => 2,
            'active' => 1,
        ]);

        $response->assertOk();
    }

    /**
     * Test get 1 project
     *
     * @return void
     */
    public function test_get_one_project()
    {
        $this->withoutExceptionHandling();

        $project = Project::factory()->make();

        $response = $this->get('/projects/' . $project->id);
        $response->assertOk();
    }
}

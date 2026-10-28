<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_all_required_pages_are_available(): void
    {
        $this->get('/')->assertOk()->assertSee('Make today')->assertSee('Finish the Eloquent model activity');
        $this->get('/tasks')->assertOk()->assertSee('Every task')->assertSee('Submit the GitHub and hosted links');
        $this->get('/profile')->assertOk()->assertSee('Angel C. Tolentino')->assertSee('angeltolentino');
        $this->get('/about')->assertOk()->assertSee('Less clutter')->assertSee('Angel C. Tolentino');
    }

    public function test_home_shows_only_tasks_for_today(): void
    {
        $this->get('/')->assertSee('Review Laravel routing notes')->assertDontSee('Practice Eloquent date filtering');
    }

    public function test_task_list_displays_every_seeded_task_in_date_order(): void
    {
        $this->get('/tasks')->assertOk()->assertSeeInOrder([
            'Read the TSA3 activity guide',
            'Finish the Eloquent model activity',
            'Practice Eloquent date filtering',
            'Submit the GitHub and hosted links',
        ]);
        $this->assertDatabaseCount('tasks', 9);
    }

    public function test_seeder_is_repeatable_and_keeps_exactly_one_user(): void
    {
        $this->seed();
        $this->assertDatabaseCount('tasks', 9);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_blade_escapes_database_content(): void
    {
        Task::query()->firstOrFail()->update(['title' => '<script>unsafe</script>']);
        $this->get('/tasks')->assertSee('<script>unsafe</script>')->assertDontSee('<script>unsafe</script>', false);
    }

    public function test_pages_handle_empty_tables(): void
    {
        Task::query()->delete();
        $this->get('/')->assertOk()->assertSee('Your schedule is clear.');
        $this->get('/tasks')->assertOk()->assertSee('No tasks are available.');
    }
}

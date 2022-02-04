<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;
    /**
     * Entrar na página inicial e ver a frase "Instact"
     *
     * @return void
     */
   public function testOpenIndexAndSeeInstact()
   {
       $response = $this->get('/');

       $response->assertSee('Instact');
   }

   /**
    * Entrar na rota inicial e não ver a palavra Dashboard
    *
    *@return void
    */
    public function testOpenIndexAndNotSeeDashboard()
    {
        $response=$this->get('/');

        $response->assertDontSee('Dashboard');
    }
    /**
     * Tentar acessar a rota Dashboard sem autenticação e retornar erro
     * 
     * @return void
     */
    public function testOpenDashboardShouldReturnErrorWithoutAuth()
    {
        $response=$this->get('dashboard');

       $response->assertRedirect('/');
    }

/**
 * Entrar na rotta Dashboard com autenticação
 * 
 * @return void
 */
    public function testShouldOpenDasboardWithAuth()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response=$this->get('/dashboard');
        $response->assertOk();
        $response->assertSee('Dashboard');
    }
    /**
     * Acessar rota /posts/stor e criar um post
     * 
     * @return void
     */

     public function testShouldStorePost()
     {
         $user= User::factory()->create();
         $this->actingAs($user);

        $input=[
            'description' => $this->faker->sentence(4),
            'photo' => UploadedFile::fake()->image('img.png')
        ];
   $this->post('/posts/store', $input);
        $this->assertDatabaseHas('posts', [
        'description' =>$input['description'],
        'user_id'=>$user->id
        ]);
     }
}


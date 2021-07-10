<?php

namespace Tests\Feature;
use App\Models\SalesUsers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesUserApiTest extends TestCase
{
    use RefreshDatabase;
    /**  @test */
    public function a_sales_user_can_be_add_to_the_server()
    {
        $this->withoutExceptionHandling();
        $response =  $this->post('/sales_user', [
            'name' => 'Test name',
            'emailAddress' => 'test@gmail.com',
            'telephoneNumbers' => '0773738181',
            'joinedDates' => '2021/05/03',
            'currentRoutes' => 'Test current Route',
            'comments' => 'comment',
            ]);
        $response->assertOk();
        $this->assertCount(1, SalesUsers::all());
    }

     /**  @test */
     public function a_sales_users_field_is_required()
     {
         $this->withoutExceptionHandling();
         $response =  $this->post('/sales_user', [
            'name' => 'Test name',
            'emailAddress' => 'test@gmail.com',
            'telephoneNumbers' => '0773738181',
            'joinedDates' => '2021/05/03',
            'currentRoutes' => 'Test current Route',
            'comments' => 'comment',]);
         $response->assertSessionHasErrors('sales_user');
     }

     /**  @test */
     public function a_sales_users_can_view()
     {
         $this->withoutExceptionHandling();
         $response =  $this->get('/sales_user/1');
        $response->assertOk();
     }

   
}

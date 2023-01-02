<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private const LOGIN_API_ENDPOINT = 'api/v1/login';
    private const LOGOUT_API_ENDPOINT = 'api/v1/logout';
    private const REGISTER_API_ENDPOINT = 'api/v1/register';

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createTestUser();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @return void
     */
    public function test_can_register(): void
    {
        $params = [
            'name' => 'test',
            'email' => 'testtest@example.com',
            'password' => 'password',
        ];
        $this->postJson(self::REGISTER_API_ENDPOINT, $params)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'ok',
            ]);
    }

    /**
     * @return void
     */
    public function test_cannot_register(): void
    {
        $params_fail = [
            'email' => 'dsafawe',
        ];
        $this->postJson(self::REGISTER_API_ENDPOINT, $params_fail)
            ->assertStatus(422)
            ->assertJson([
                'message' => [
                    'name' => ['nameは必ず入力してください。'],
                    'email' => ['emailには、有効なメールアドレスを入力してください。'],
                    'password' => ['passwordは必ず入力してください。']
                ],
            ]);
    }

    /**
     * @return void
     */
    public function test_can_login(): void
    {
        $params = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];
        $this->postJson(self::LOGIN_API_ENDPOINT, $params)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'ok',
            ]);
    }

    /**
     * @return void
     */
    public function test_cannot_login_without_params(): void
    {
        $this->postJson(self::LOGIN_API_ENDPOINT, [])
            ->assertStatus(401)
            ->assertJson([
                'message' => [
                    'email' => ['emailは必ず入力してください。'],
                    'password' => ['passwordは必ず入力してください。']
                ],
            ]);
    }

    /**
     * @return void
     */
    public function test_cannot_login_wrong_password(): void
    {
        $params = [
            'email' => 'test@example.com',
            'password' => 'tttttttt',
        ];
        $this->postJson(self::LOGIN_API_ENDPOINT, $params)
            ->assertStatus(401)
            ->assertJson([
                'message' => [
                    'password' => ['パスワードが正しくありません。']
                ],
            ]);
    }

    /**
     * @return void
     */
    public function test_can_logout(): void
    {
        $this->actingAs($this->user)
            ->postJson(self::LOGOUT_API_ENDPOINT)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'ログアウトしました。',
            ]);
        $this->assertGuest();
    }

    /**
     * @return void
     */
    public function test_already_logout(): void
    {
        $this->postJson(self::LOGOUT_API_ENDPOINT)
            ->assertStatus(200)
            ->assertJson([
                'message' => '既にログアウト済みです。',
            ]);
        $this->assertGuest();
    }

    /**
     * テストユーザー作成
     *
     * @return User
     */
    private function createTestUser(): User
    {
        return User::factory()->create(['email' => 'test@example.com']);
    }
}

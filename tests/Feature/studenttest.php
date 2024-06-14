<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_student()
    {
        // Mock the UniqueMachineID method to return a consistent value
        $this->partialMock(Student::class, function ($mock) {
            $mock->shouldReceive('UniqueMachineID')->andReturn('74be16979710d4c4e7c6647856088456');
        });

        $student = Student::create([
            'name' => 'SaingNam',
            'email' => 'saingnam@gmail.com',
            'phone' => '096 720 5225',
            'dob' => '2001-02-01',
        ]);

        $this->assertTrue($student->exists());
    }
}

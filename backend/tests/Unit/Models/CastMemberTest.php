<?php

namespace Tests\Unit\Models;

use App\Model\CastMember;
use App\Model\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CastMemberTest extends TestCase
{
    use DatabaseMigrations;

    private $cast_member;

    public static function setUpBeforeClass(): void
    {
        // parent::setUpBeforeClass(); // TODO: Change the autogenerated stub
    }

    public function setUp(): void
    {
        $this->cast_member = new CastMember();
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public static function tearDownAfterClass() :void
    {
        parent::tearDownAfterClass(); // TODO: Change the autogenerated stub
    }

    public function testIfUseTraits()
    {
        $traits = [
            SoftDeletes::class,
            Uuid::class

        ];
        $castMemberTraits = array_keys(class_uses(CastMember::class));
        $this->assertEquals($traits, $castMemberTraits);
    }

    public function testFillableAttribute()
    {
        $fillable = ['name', 'type'];
        $this->assertEquals($fillable, $this->cast_member->getFillable());
    }



    public function testCasts()
    {
        $casts = ['id' => 'string', 'type' => 'integer'];
        $this->assertEquals($casts, $this->cast_member->getCasts());
    }

    public function testDatesAttribute()
    {
        $datesAttribute = ['deleted_at', 'created_at', 'updated_at'];

        $this->assertEqualsCanonicalizing($datesAttribute, $this->cast_member->getDates());

    }
}
